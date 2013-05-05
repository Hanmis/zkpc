<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $hot_topics = Yii::app()->db->createCommand()
                        ->select('tid, title, replies_count, user_id, {{user}}.email')
                        ->from('{{topic}}')
                        ->join('{{user}}', '{{topic}}.user_id = {{user}}.uid')
                        ->where('{{topic}}.state=:state', array(':state'=>Topic::STATUS_PUBLISHED))
                        ->order('replies_count desc')
                        ->limit(10)
                        ->offset(0)
                        ->queryAll();
        $love_topics = Yii::app()->db->createCommand()
                        ->select('tid, title, love_count, user_id, {{user}}.email')
                        ->from('{{topic}}')
                        ->join('{{user}}', '{{topic}}.user_id = {{user}}.uid')
                        ->where('{{topic}}.state=:state', array(':state'=>Topic::STATUS_PUBLISHED))
                        ->order('love_count desc')
                        ->limit(10)
                        ->offset(0)
                        ->queryAll();
        $sections = Yii::app()->db->createCommand()
                        ->select('sid, name')
                        ->from('{{section}}')
                        ->where('{{section}}.state=:state', array(':state'=>Topic::STATUS_PUBLISHED))
                        ->order('sort asc')
                        ->queryAll();
        $nodes = Yii::app()->db->createCommand()
                        ->select('nid, name, section_id')
                        ->from('{{node}}')
                        ->where('{{node}}.state=:state', array(':state'=>Topic::STATUS_PUBLISHED))
                        ->order('sort asc')
                        ->queryAll();
        $languages = Yii::app()->db->createCommand()
                        ->select('plid, name')
                        ->from('{{programming_language}}')
                        ->where('{{programming_language}}.state=:state', array(':state'=>Topic::STATUS_PUBLISHED))
                        ->order('sort asc')
                        ->queryAll();
//        var_dump($nodes);exit;
		$this->render('index', array(
            'hot_topics' => $hot_topics,
            'love_topics'=>$love_topics,
            'sections' => $sections,
            'nodes'=>$nodes,
            'languages'=> $languages
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionMember()
    {
        $users = Yii::app()->db->createCommand()
            ->select('uid, name, avatar_file_name, email')
            ->from('{{user}}')
            ->limit(100)
            ->offset(0)
            ->queryAll();
        $this->render('member', array(
            'users' => $users
        ));
    }
}