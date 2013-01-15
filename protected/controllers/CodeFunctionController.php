<?php

class CodeFunctionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/code_column';

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
            )
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
}
