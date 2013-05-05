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

    //将时间换成多少天前或多少月前
    public  static function datetime_diff($datetime)
    {
        if(!isset($datetime) || $datetime == null)
            return '';
        $datetime = is_string($datetime) ? new DateTime($datetime) : $datetime;
        $diff = date_create('now')->diff($datetime);
        $suffix = ( $diff->invert ? '之前' : '后' );
        $diff_str = '';
        $years      = $diff->y ? $diff->y . '年' : null;
        $months     = $diff->m ? $diff->m . '个月' : null;
        $days       = $diff->d ? $diff->d . '天' : null;
        $hours      = $diff->h ? $diff->h . '小时' : null;
        $minutes    = $diff->i ? $diff->i . '分钟' : null;
        $seconds    = $diff->s ? $diff->s . '秒' : null;
        if ($years)
            $diff_str = $years . $months;
        elseif ($months)
            $diff_str = $months . $days;
        elseif ($days)
            $diff_str = $days . $hours;
        elseif ($hours)
            $diff_str = $hours . $minutes;
        else
            $diff_str = $minutes . $seconds;
        return $diff_str . $suffix;
    }

    public static function getNameById($id) {
        $sql = "select name from {{user}} where uid=:uid";
        $dbCommand = Yii::app()->db->createCommand($sql);
        $dbCommand->bindParam(':uid', $id);
        $result = $dbCommand->queryAll();
        if (isset($result[0]['name']))
            return $result[0]['name'];
        else
            return '';
    }
}