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
                $this->redirect(Yii::app()->user->returnUrl);
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
            if($model->save())
                $this->render('login');
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
}