<?php
/**
 *@这是user两列的布局，渲染到main.php布局文件中去
  */
?>
<?php $this->beginContent('/layouts/main'); ?>
<p></p>
<div class="container">
    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>