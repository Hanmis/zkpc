<?php 
/**
 * @这是一列的布局，渲染到main.php布局文件中去
 */
?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>