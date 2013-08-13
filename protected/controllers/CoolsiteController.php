<?php

class CoolsiteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Coolsite;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $sql = "select ctid, name from {{coolsite_type}} where state=1 order by sort asc";
        $dbcommand = Yii::app()->db->createCommand($sql);
        $coolsiteTypes = $dbcommand->queryAll();
        $coolsiteTypes = CHtml::listData($coolsiteTypes, 'ctid', 'name'); //转成一维数组

		if(isset($_POST['Coolsite']))
		{
            //查询user_id
            $username = Yii::app()->user->name;
            $sql = "select uid from {{user}} where username=:username";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':username', $username);
            $user_id = $dbCommand->queryScalar();
            if (!$user_id)
                return;
            $model->user_id = $user_id;
            $model->ct_id = $_POST['ct_id'];
			$model->attributes=$_POST['Coolsite'];
            if ($_POST['Coolsite']['favicon'] == null) {
                $str = $_POST['Coolsite']['url'];
                if ($str[strlen($str)-1] == '/')
                    $model->favicon = $model->url.'favicon.ico';
                else
                    $model->favicon = $model->url.'/favicon.ico';
            }
//            var_dump($model->attributes);exit;
			if($model->save())
				$this->redirect(Yii::app()->createUrl('Coolsite/index'));
		}

		$this->render('create',array(
            'coolsiteTypes'=>$coolsiteTypes,
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

		if(isset($_POST['Coolsite']))
		{
			$model->attributes=$_POST['Coolsite'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cid));
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
        $coolsiteType = CoolsiteType::model()->findAll(array('order'=>'sort'));
        $this->render('index',array(
            'coolsiteType'=>$coolsiteType,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Coolsite('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coolsite']))
			$model->attributes=$_GET['Coolsite'];

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
		$model=Coolsite::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='coolsite-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
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
}
