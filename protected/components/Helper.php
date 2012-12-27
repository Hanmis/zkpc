<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 12-12-22
 * Time: 下午10:46
 * To change this template use File | Settings | File Templates.
 */
class Helper
{
    //$type = success or warning or notice or error
    public static function getToastMessage($controller, $message, $type)
    {
        return $controller->widget('application.extensions.toastMessage.toastMessageWidget',
            array(
                'message'=>$message,
                'type'=>$type,
                'options'=>array(
                    'sticky'=>false,
                    'position'=>'middle-center',
                    'stayTime'=>2000
                )
            ));
    }
}