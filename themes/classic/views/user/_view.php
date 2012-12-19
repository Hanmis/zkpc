<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 12-12-17
 * Time: 下午9:06
 * To change this template use File | Settings | File Templates.
 */
echo $model->uid."<br/>";
echo $model->username."<br/>";
echo $model->email."<br/>";
echo $model->name."<br/>";
echo $model->avatar_file_name."<br/>";
echo $model->state."<br/>";
echo $model->website."<br/>";
echo CHtml::image($model->avatar_file_name);
?>
