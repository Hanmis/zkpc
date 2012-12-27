<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 12-12-4
 * Time: 下午10:28
 * To change this template use File | Settings | File Templates.
 */
class UserController extends Controller
{
    public $layout='user_column'; //指定控制器所指向的布局文件
    private $user_type; //判断跳转哪个页面的变量

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function getUserType()
    {
        return $this->user_type;
    }
    public function setUserType($u_type)
    {
        $this->user_type = $u_type;
    }
    public function actionLogin()
    {
        $model=new LoginForm;
        $this->setUserType('login');
        // if it is ajax validation request
        /*
        if (isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */
        // collect login input data
        if (isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
            {
            	Yii::app()->user->setFlash('message', '登录成功');
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    public function actionRegister()
    {
        $model = new User;
        $this->setUserType('register');

        //if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect register input data
        if (isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            $model->pwd_salt = uniqid('zkpc');
            $model->pwd = md5($model->pwd_salt.$_POST['User']['pwd']);
            $model->repwd = md5($model->pwd_salt.$_POST['User']['repwd']); //服务器端验证的时候，确认密码也需要加密才能同步
            if($model->save()){
            	Yii::app()->user->setFlash('message', '注册成功，请登录');
				$this->redirect(Yii::app()->createUrl('user/login'));//返回的到登录界面
            }
        }
        $this->render('register', array('model'=>$model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionView()
    {
        if(!isset($_GET['uid'])){
            $uid = Yii::app()->user->id;
        } else {
            $uid = $_GET['uid'];
        }
        $this->render('view',array(
            'model'=>$this->loadModel($uid),
        ));
    }

    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
        if(!$model->avatar_file_name)
        {
            $model->avatar_file_name = User::get_gravatar($model->email, 120); //使用Gravatar的图片
        }
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

	//find password
	public function actionFindPwd()
	{
		$model = new FindPwdForm;
		
		if (isset($_POST['FindPwdForm'])) {
			$model->attributes = $_POST['FindPwdForm'];
			//先服务器端验证rules()方法
			if($model->validate()){
				$email = $model->email;
	            $user  = User::model()->find('LOWER(email)=?', array(strtolower($email)));	           
	            $x = md5($user->email."+".$user->pwd_salt);
	            $string = base64_encode($user->name.".".$x);
	            $url = Yii::app()->createUrl('user/resetpwd', array('p'=>$string));
				$message = "尊敬的".$user->name."先生/女士：<br /><br/>&nbsp;&nbsp;&nbsp;&nbsp;".
				           " 你使用了本站提供的密码找回功能，如果你确认此密码找回功能是你启用的，".
	                        "请点击下面的链接，按流程进行密码重设。<br/><br/>欢迎你经常访问本站。".
	                        "站长无喱头谢谢你经常光顾本站！".
	                        "<br><Br><a href=".$url.">确认密码找回</a>";
				$mail = Yii::app()->mailer;
				$mail->Host = 'smtp.qq.com';
				$mail->CharSet = "UTF-8";
				$mail->IsSMTP();
                $mail->IsHTML();
				$mail->SMTPAuth = true;
				$mail->Username = '376841127@qq.com';
				$mail->Password = 'gyhlhm';
				$mail->From = "376841127@qq.com";
				$mail->FromName = "zkpc";
				$mail->AddAddress($model->email, "hanmis");
				$mail->Subject = "找回密码";
				$mail->Body = $message;
				if($mail->Send()){
					Yii::app()->user->setFlash('message', '几分钟后，你将收到修改密码的邮件！');
					$this->redirect(Yii::app()->createUrl('user/login'));//返回的到登录界面
				} else {
					Yii::app()->user->setFlash('message', '邮件发送失败，请重新提交');
					$this->redirect(Yii::app()->createUrl('user/findpwd'));
				}
			}         				
		} 
		
		$this->render('findpwd', array('model'=>$model));
	}

    public function actionResetPwd($p){
    	
    	$model = new ResetPwdForm;
		
    	if (!isset($_POST['ResetPwdForm'])){
    		$array = explode('.', base64_decode($p));
			$user = User::model()->find('LOWER(name)=?', array(strtolower($array[0])));
			//判断参数中用户名是否被改
			if (!isset($user->name)){
				throw new CHttpException(403, 'url error');
			} else {
				$checkCode = md5($user->email."+".$user->pwd_salt);
				//判断参数中密码锁是否被改
				if ($array[1] === $checkCode) {
					//判断用户是否登录如果登录，返回到主页
					if(Yii::app()->user->name == $array[0]) {
						$this->redirect(Yii::app()->user->returnUrl);
					} else {				
						$model->email = $user->email;
						$this->render('resetpwd', array('model'=>$model));
					}
				} else {
					throw new CHttpException(403, 'url error');
				}
			}		
    	} else {
			$model->attributes = $_POST['ResetPwdForm'];	
			//服务器端验证
			if($model->validate()){
				$pwd_salt = uniqid('zkpc');
				$model->pwd = md5($pwd_salt.$model->pwd);			
				$user = new User;
				$user = User::model()->find('LOWER(email)=?', array(strtolower($_POST['ResetPwdForm']['email'])));
				if (!isset($user)) {
					throw new CHttpException(403, 'the request has not email');
				} else {
					$user->pwd_salt = $pwd_salt;
					$user->pwd = $model->pwd;
					if ($user->update()) {
						Yii::app()->user->setFlash('message', '重设密码成功，请登录');
						$this->redirect(Yii::app()->createUrl('user/login'));
					} else {
						throw new CHttpException(403, 'update exception');
					}
				}						
			}
			//?为何$model->attributes = S_POST['ResetPwdForm']不能给email赋值，只能用下面赋值方法先
			$model->email = $_POST['ResetPwdForm']['email'];
			$this->render('resetpwd', array('model'=>$model));		  		
    	}		
  	 }
}