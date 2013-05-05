<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-4
 * Time: 下午1:44
 * To change this template use File | Settings | File Templates.
 */
$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('backend', $backend);

return array(
    'basePath'=>$frontend,
    'controllerPath' => $backend.'/controllers',
    'viewPath' => $backend.'/views',
    'runtimePath' => $backend.'/runtime',
    'name'=>'ZKPCLOG BACKEND',
    'defaultController'=>'admin/index',
    'language'=>'zh_cn',
    // preloading 'log' component
    'preload'=>array(
        'log',
        'bootstrap',
    ),
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'backend.models.*',
        'backend.components.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii', // since 0.9.1
            ),
        ),

    ),
    // application components
    'components'=>array(
        'assetManager'=>array(
            'newDirMode'=>0755,
            'newFileMode'=>0644,
        ),

        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>false,
        ),


        'request'=>array(
            //CSRF防范
            'enableCsrfValidation'=>true,
            // Cookie攻击的防范
            'enableCookieValidation'=>true,
        ),
        /*
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        */
        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=zkpc',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '6596022',
            'charset' => 'utf8',
            'tablePrefix' => 'zkpc_',
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages

                array(
                    'class'=>'CWebLogRoute',
                ),

            ),
        ),
    ),

);
