<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-4-21
 * Time: 下午6:47
 * To change this template use File | Settings | File Templates.
 */
$this->breadcrumbs=array(
    'Topics'=>array('index'),
);
?>

<div class="column2_content box_gray">
    <div id="node_info">
        <?php if (isset($node_id)):?>
        <div>
            <em style="font-size: 20px; color: #000000;"><?php echo $node[0]['name'];?></em>&nbsp;&nbsp;&nbsp;共有<?php echo $node[0]['topics_count'];?>个讨论主题<br/>
            <?php echo $node[0]['summary'];?>
        </div>

        <?php else:?>
        <div class="sorts">
            <span class="lb">查看:</span>
            <ul>
                <li class="active">
                    <a <?php if (!isset($sort_type)):?>class="link_font_color"<?php endif;?> href="<?php echo Yii::app()->createUrl('Topic/index');?>">默认</a>/
                </li>
                <li>
                    <a <?php if (isset($sort_type) && $sort_type=='good_topic'):?>class="link_font_color"<?php endif;?> href="<?php echo Yii::app()->createUrl('Topic/index', array('sort_type'=>'good_topic'));?>">
                        <i class="icon small_liked"></i>
                        优质帖子
                    </a>/
                </li>
                <li>
                    <a <?php if (isset($sort_type) && $sort_type=='no_replied'):?>class="link_font_color"<?php endif;?> href="<?php echo Yii::app()->createUrl('Topic/index', array('sort_type'=>'no_replied'));?>">无人问津</a>/
                </li>
                <li>
                    <a <?php if (isset($sort_type) && $sort_type=='new_created'):?>class="link_font_color"<?php endif;?> href="<?php echo Yii::app()->createUrl('Topic/index', array('sort_type'=>'new_created'));?>">最新创建</a>
                </li>
            </ul>
        </div>
        <?php endif;?>
    </div>
    <div class="topics">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            'ajaxUpdate'=>false,
        )); ?>
    </div>
</div>
<div class="column2_sidebar">
    <h2 class="title">发布主题</h2>
    <?php if(!Yii::app()->user->isGuest):?>
        <a href="<?php echo Yii::app()->createUrl('Topic/create'); ?>">发布主题</a></br>
    <?php else:?>
        <a class="button green" href="<?php echo Yii::app()->createUrl('User/login')?>">会员登录后可以发布主题</a>
    <?php endif?>
</div><!--右边栏结束-->

