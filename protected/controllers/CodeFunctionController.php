<?php

class CodeFunctionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/code_column';
    private $isBetterCode;
    private $codeFunctionId;

	/**
	 * @return array action filters
	 */
    public function getIsBetterCode(){
        return $this->isBetterCode;
    }
    public function getCodeFunctionId(){
        return $this->codeFunctionId;
    }
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','love','GetCodeType'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ShareCode','Comment'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $this->isBetterCode = true;
        $this->codeFunctionId = $id;
        $session = Yii::app()->session;
        $ip = Yii::app()->request->userHostAddress;
        if(!isset($session['ip'.$id])){
            $session['ip'.$id] = $ip;
            //更新阅读数
            $code_function = CodeFunction::model()->findByPk($id);
            $code_function->read_count = $code_function->read_count + 1;
            $code_function->update();
        }
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CodeFunction;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CodeFunction']))
		{
			$model->attributes=$_POST['CodeFunction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cfid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CodeFunction']))
		{
			$model->attributes=$_POST['CodeFunction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cfid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$pl_id = Yii::app()->request->getParam('pl_id');
		$ct_id = Yii::app()->request->getParam('ct_id');
		$pl_name = Yii::app()->request->getParam('pl_name');
		$ct_name = Yii::app()->request->getParam('ct_name');
		//code catalogs 条件 
		$db = Yii::app()->db;
		$sql = "select * from {{programming_language}}";
		$dbCommand = $db->createCommand($sql);
		//code function list 条件
		$criteria = new CDbCriteria;
		if (isset($pl_id) && isset($pl_name)) {
			$criteria->addCondition('pl_id='.$pl_id);
			$sql = "select * from {{code_type}} where pl_id=:pl_id";
			$dbCommand = $db->createCommand($sql);
			$dbCommand->bindParam(':pl_id', $pl_id);
		}	
		if (isset($ct_id)) {
			$criteria->addCondition('ct_id='.$ct_id);
		}
		
		$codeCatalogs = $dbCommand->queryAll();
		
		$cfudataProvider = new CActiveDataProvider('CodeFunction',array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 'created_at  DESC',
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
		));		
		// var_dump($cfudataProvider);exit;
		$this->render('index',array(
			'ct_name'=>$ct_name,
			'pl_name'=>$pl_name,
			'pl_id'=>$pl_id,
			'codeCatalogs'=>$codeCatalogs,
			'cfudataProvider'=>$cfudataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CodeFunction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CodeFunction']))
			$model->attributes=$_GET['CodeFunction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CodeFunction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='code-function-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionShareCode()
	{
		$model = new ShareCodeForm;
		$sql = "select plid, name from {{programming_language}}";
		$db = Yii::app()->db->createCommand($sql);
		$pls = $db->queryAll();
		$pls = CHtml::listData($pls, 'plid', 'name'); //转成一维数组

		if (isset($_POST['SharecodeForm'])) {
            $this->preventDupicateSubmit();
            //查询user_id
            $username = Yii::app()->user->name;
            $sql = "select uid from {{user}} where username=:username";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':username', $username);
            $user_id = $dbCommand->queryScalar();

            //分享更好的代码
            if (isset($_GET['codeFunctionId'])) {
                $model->attributes = $_POST['SharecodeForm'];
                //为通过验证赋值
                $model->pl_id = 1;
                $model->ct_id = 1;
                $model->title = 'not value';
                $model->intro = $_POST['SharecodeForm']['intro'];
                //只验证code
                if ($model->validate()) {
                    $cfrmodel = new CodeFragment;
                    $cfrmodel->cfu_id = $_GET['codeFunctionId'];
                    $cfrmodel->user_id = $user_id;
                    $cfrmodel->intro = $_POST['SharecodeForm']['intro'];
                    $cfrmodel->code = $_POST['SharecodeForm']['code'];
                    if ($cfrmodel->save()) {
                        $this->redirect(Yii::app()->createUrl('codeFunction/view', array('id'=>$cfrmodel->cfu_id)));
                    }
                }
                //查询cfuTitle
                $sql = "select title from {{code_function}} where cfid=:cfid";
                $dbCommand = Yii::app()->db->createCommand($sql);
                $dbCommand->bindParam(':cfid',$_GET['codeFunctionId']);
                $cfuTitle = $dbCommand->queryScalar();

                $this->render('shareCode', array(
                    'model'=>$model,
                    'pls'=>$pls,
                    'codeFunctionId'=>$_GET['codeFunctionId'],
                    'cfuTitle' => $cfuTitle
                ));exit(0);
            }

            $model->attributes = $_POST['SharecodeForm'];
			$model->pl_id = $_POST['pl_id'];
			$model->ct_id = $_POST['ct_id'];
			$model->intro = $_POST['SharecodeForm']['intro'];
//			 var_dump($model->attributes);exit;
			//服务器端先验证表单
			if ($model->validate()) {
				$cfumodel = new CodeFunction;
				$cfrmodel = new CodeFragment;
				$cfumodel->title = $_POST['SharecodeForm']['title'];
				$cfumodel->pl_id = $_POST['pl_id'];
				$cfumodel->ct_id = $_POST['ct_id'];
//                var_dump($cfrmodel);exit;
				if ($cfumodel->save()) {		
					$cfrmodel->cfu_id = $cfumodel->cfid; //保存成功或获取主键ID
					$cfrmodel->user_id = $user_id;
					$cfrmodel->intro = $_POST['SharecodeForm']['intro'];
					$cfrmodel->code = $_POST['SharecodeForm']['code'];
//                    var_dump($cfrmodel);exit;
					if ($cfrmodel->save()) {
                        $this->redirect(Yii::app()->createUrl('codeFunction/index'));
					} 
				}		
			}
			
		}

        if (isset($_GET['codeFunctionId'])) {
            //查询cfuTitle
            $sql = "select title from {{code_function}} where cfid=:cfid";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':cfid',$_GET['codeFunctionId']);
            $cfuTitle = $dbCommand->queryScalar();

            $this->render('shareCode', array(
                'model'=>$model,
                'pls'=>$pls,
                'codeFunctionId'=>$_GET['codeFunctionId'],
                'cfuTitle' => $cfuTitle
            ));exit(0);
        }
		$this->render('shareCode', array(
			'model'=>$model,
			'pls'=>$pls,
		));
 	}


	public function actionGetCodeType()
	{
		$pl_id = (int)$_POST['pl_id'];
		$models = CodeType::model()->findAll(array('condition'=>'pl_id=:pl_id', 'params'=>array(':pl_id'=>$pl_id)));
		$data = CHtml::listData($models, 'ctid', 'name');
		foreach ($data as $value => $name) {
			echo CHtml::tag('option', array('value'=>$value), CHtml::encode($name),true);
		}	
	}

    public function actionComment() {
        if ($_POST) {
            $this->preventDupicateSubmit(10, $_POST['cfr_id']);
            $model = new CodeComment;
            //查询user_id
            $username = Yii::app()->user->name;
            $sql = "select uid from {{user}} where username=:username";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':username', $username);
            $user_id = $dbCommand->queryScalar();

            //查询评论表最后一个id
            $sql = "select max(ccid) from {{code_comment}}";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $ccid = $dbCommand->queryScalar()+1;

            $model->content = $_POST['content'];
            $model->cfr_id = $_POST['cfr_id'];
            $model->user_id = $user_id;
            $model->path = $ccid.",";
            //嵌套评论
            if (isset($_POST['pid'])) {
                $model->pid = $_POST['pid'];
                $model->path = $_POST['path'].$ccid.",";
            }
//            var_dump($model->attributes);exit;
            if ($model->save()) {
                //更新评论数
                $comment = CodeComment::model()->findByPk($_POST['cfr_id']);
                $comment->comments_count = $comment->comments_count + 1;
                $comment->update();
                $this->redirect(Yii::app()->request->urlReferrer);
            } else {
                Yii::app()->user->setFlash('error', '保存失败');
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }
    }
    //防止重复提交的方法
    private function preventDupicateSubmit($time = 10, $flag = '_is_sub', $warning='10s内不能提交两次') {
        $session = Yii::app()->session;
        $user_name = Yii::app()->user->name;
        $sessionKey = $user_name.$flag;
        if (isset($session[$sessionKey])) {
            $first_submit_time = $session[$sessionKey];
            $current_time = time();
            if ($current_time - $first_submit_time < $time) {
                $session[$sessionKey] = $current_time;
                Yii::app()->user->setFlash('warning', $warning);
                $this->redirect(Yii::app()->request->urlReferrer);
            }else{
                unset($session[$sessionKey]);//超过限制时间，释放session";
            }
        }
        //第一次点击确认按钮时执行
        if(!isset($session[$sessionKey])){
            $session[$sessionKey] = time();
        }
    }

    public function actionLove(){

        if (isset($_POST['cfid'])) {
            $cookie = Yii::app()->request->getCookies();
            if (!isset($cookie['CodeLoveCookie'.$_POST['cfid']])) {
                $codeFragment = CodeFragment::model()->findByPk($_POST['cfid']);
                $codeFragment->love_count += 1;
                $codeFragment->update();

                $cookie = new CHttpCookie('CodeLoveCookie'.$_POST['cfid'], Yii::app()->request->userHostAddress);
                $cookie->expire = time()+60*60*24*30;
                Yii::app()->request->cookies['CodeLoveCookie'.$_POST['cfid']]=$cookie;

                echo $_POST['cfid'].":".$codeFragment->love_count;
            } else {
                $codeFragment = CodeFragment::model()->findByPk($_POST['cfid']);
                $codeFragment->love_count -= 1;
                $codeFragment->update();

                $cookie = Yii::app()->request->getCookies();
                unset($cookie['CodeLoveCookie'.$_POST['cfid']]);

                echo $_POST['cfid'].":".$codeFragment->love_count;
            }
        }
    }
}
