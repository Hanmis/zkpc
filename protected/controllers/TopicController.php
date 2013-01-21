<?php

class TopicController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/topic_column';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
    /*
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
    */
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($tid)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($tid),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Topic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$sql = "select  sid, name from {{section}}";
		$dbcommand = Yii::app()->db->createCommand($sql);
		$sections = $dbcommand->queryAll();
		$sections = CHtml::listData($sections, 'sid', 'name'); //转成一维数组
		
		if(isset($_POST['Topic']))
		{
			$model->attributes=$_POST['Topic'];
			$model->node_id = $_POST['node_id'];
			// var_dump($model->attributes);exit;
			if($model->save())
				echo "success";exit;
		}

		$this->render('create',array(
			'model'=>$model,
			'sections'=>$sections,
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

		if(isset($_POST['Topic']))
		{
			$model->attributes=$_POST['Topic'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tid));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Topic');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Topic('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Topic']))
			$model->attributes=$_GET['Topic'];

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
		$model=Topic::model()->findByPk($id);
//        if(!$model->avatar_file_name)
//        {
//            $model->avatar_file_name = User::get_gravatar($model->email, 80);   //使用Gravater的图片
//        }
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='topic-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionGetNode()
	{
		$section_id = (int)$_POST['section_id'];
		$models = Node::model()->findAll(array('condition'=>'section_id=:section_id', 'params'=>array(':section_id'=>$section_id)));
		$data = CHtml::listData($models, 'nid', 'name');
		foreach ($data as $value => $name) {
			echo CHtml::tag('option', array('value'=>$value), CHtml::encode($name),true);
		}		
	}
}
