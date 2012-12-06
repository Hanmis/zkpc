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
    public $layout='column2'; //指定控制器所指向的布局文件

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
}