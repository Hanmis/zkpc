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
    public static function getToastMessage($controller, $message)
    {
        return $controller->widget('application.extensions.toastMessage.toastMessageWidget',
            array(
                'message'=>$message,
                'type'=>'success',
                'options'=>array(
                    'sticky'=>false,
                    'position'=>'middle-center',
                    'stayTime'=>3000
                )
            ));
    }
}