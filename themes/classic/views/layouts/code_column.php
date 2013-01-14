<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/code/sharecode.css"/>
<?php
/**
 * @这是code两列的布局，渲染到main.php主布局文件中去
 */
?>
<?php $this->beginContent('/layouts/main'); ?>
<p></p>
<!--code左边列开始-->
<div class="container">
        <?php echo $content;?>
</div>
<!--code左边列结束-->
<?php $this->endContent(); ?>