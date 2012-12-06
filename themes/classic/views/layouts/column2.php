<?php
/**
 *@这是两列的布局，渲染到main.php布局文件中去
  */
?>
<?php $this->beginContent('/layouts/main'); ?>
<p></p>
<div class="container">
	<div class="column2_content">
            <?php echo $content; ?>
	</div>
	<div class="column2_sidebar">
        <h2 class="title">还没有帐号？</h2>
        <?php echo CHtml::link('注册', '#')?><br/>
        <?php echo CHtml::link('忘记了密码？', '#')?>
	</div>
    <div class="column2_sidebar">
        <h2 class="title">用其他平台帐号登录</h2>
    </div>
</div>
<?php $this->endContent(); ?>