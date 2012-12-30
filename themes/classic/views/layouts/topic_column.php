<?php
/**
 * @这是topic两列的布局，渲染到main.php主布局文件中去
 */
?>
<?php $this->beginContent('/layouts/main'); ?>
<p></p>
<!--topic左边列开始-->
<div class="container">
        <?php echo $content;?>
</div>
<!--topic左边列结束-->
<?php $this->endContent(); ?>