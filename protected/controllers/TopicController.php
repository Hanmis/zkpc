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

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','IndexNode','GetNode','love'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','reply'),
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
            //查询user_id
            $username = Yii::app()->user->name;
            $sql = "select uid from {{user}} where username=:username";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':username', $username);
            $user_id = $dbCommand->queryScalar();
            $model->user_id = $user_id;
//			var_dump($model->attributes);exit;
			if($model->save()) {
                //更新节点主题数
                $node = Node::model()->findByPk($_POST['node_id']);
                $node->topics_count = $node->topics_count + 1;
                $node->update();
                $this->redirect(Yii::app()->createUrl('Topic/index', array('sort_type'=>'new_created')));
            }
		}

		$this->render('create',array(
			'model' => $model,
			'sections' => $sections
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
        $sort_type = Yii::app()->request->getParam('sort_type');
        //topic排序查询
        switch ($sort_type) {
            case 'good_topic' :
                $str = 'love_count DESC';
                break;
            case 'no_replied' :
                $str = 'replies_count ASC';
                break;
            case 'new_created' :
                $str = 'created_at DESC';
                break;
            default;
                $str = 'replies_count DESC';
                break;
        }
        $dataProvider = new CActiveDataProvider('Topic',array(
            'sort'=>array(
                'defaultOrder'=> $str,
            )
        ));
        $this->render('index',array(
            'sort_type'=>$sort_type,
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionIndexNode() {
        $node_id = Yii::app()->request->getParam('node_id');
        $criteria = new CDbCriteria;
        $criteria->addCondition('node_id='.(int)$node_id);
        $dataProvider = new CActiveDataProvider('Topic',array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=> 'created_at DESC',
            )
        ));
        $node = Yii::app()->db->createCommand()
                ->select('name, topics_count, summary')
                ->from('{{node}}')
                ->where('{{node}}.nid=:nid', array(':nid'=>$node_id))
                ->queryAll();
//        var_dump($node);exit;
        $this->render('index',array(
            'node_id'=>$node_id,
            'node'=>$node,
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

    public function actionReply()
    {
        if ($_POST) {
            $this->preventDupicateSubmit(10, $_POST['cfr_id']);
            $model = new Reply;
            //查询评论表最后一个id
            $sql = "select max(rid) from {{reply}}";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $rid = $dbCommand->queryScalar()+1;
            //查询user_id
            $username = Yii::app()->user->name;
            $sql = "select uid from {{user}} where username=:username";
            $dbCommand = Yii::app()->db->createCommand($sql);
            $dbCommand->bindParam(':username', $username);
            $user_id = $dbCommand->queryScalar();

            $model->content = $_POST['content'];
            $model->topic_id = $_POST['topic_id'];
            $model->user_id = $user_id;
            $model->path = $rid.",";

            if (isset($_POST['pid'])) {
                $model->pid = $_POST['pid'];
                $model->path = $_POST['path'].$rid.",";
            }
            if ($model->save()) {
                //更新评论数等
                $topic = Topic::model()->findByPk($_POST['topic_id']);
                $topic->last_reply_user_id = $_POST['user_id'];
                $topic->replies_count = $topic->replies_count + 1;
                $topic->replied_at = new CDbExpression('NOW()');
                $topic->update();
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

        if (isset($_POST['tid'])) {
            $cookie = Yii::app()->request->getCookies();
            if (!isset($cookie['loveCookie'.$_POST['tid']])) {
                $topic = Topic::model()->findByPk($_POST['tid']);
                $topic->love_count += 1;
                $topic->update();

                $cookie = new CHttpCookie('loveCookie'.$_POST['tid'], Yii::app()->request->userHostAddress);
                $cookie->expire = time()+60*60*24*30;
                Yii::app()->request->cookies['loveCookie'.$_POST['tid']]=$cookie;

                echo $topic->love_count;
            } else {
                $topic = Topic::model()->findByPk($_POST['tid']);
                $topic->love_count -= 1;
                $topic->update();

                $cookie = Yii::app()->request->getCookies();
                unset($cookie['loveCookie'.$_POST['tid']]);

                echo $topic->love_count;
            }
        }
    }
}
