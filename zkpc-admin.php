<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-4
 * Time: 下午1:40
 * To change this template use File | Settings | File Templates.
 */
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/admin/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();