<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-2
 * Time: 下午11:31
 * To change this template use File | Settings | File Templates.
 */
?>
<li>
    <span class="stat" style="float: right;"><?php echo $data->comments_count;?>回复/<?php echo $data->love_count;?>喜欢</span>
    <span class="lang1" style="color: #AA0000;font-size: 8pt;">[<?php echo $data->cfu->programmingLanguage->name;?>]</span>
     <span class="title">
	     <a title="<?php echo $data->cfu->title;?>" style="color: #0069D6;margin-right: 5px;text-decoration: none;" href="<?php echo Yii::app()->createUrl('CodeFunction/view', array('id'=>$data->cfid));?>"><?php echo $data->cfu->title;?></a>
	     <abbr class="date" style="border-bottom: 1px dotted #666666;" title="<?php echo $data->created_at;?>"><?php echo Helper::datetime_diff($data->created_at);?></abbr>
     </span>
</li>
