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
    <?php if ($this->getUserType() == 'login'):?>
        <div class="column2_sidebar">
            <h2 class="title">还没有帐号？</h2>
            <a href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a></br>
            <a href="<?php echo Yii::app()->createUrl('#'); ?>">忘记了密码？</a>
        </div>
        <div class="column2_sidebar">
            <h2 class="title">用其他平台帐号登录</h2>
        </div>
    <?php endif;?>
    <?php if ($this->getUserType() == 'register'):?>
        <div class="column2_sidebar">
            <h2 class="title">已经有帐号了？</h2>
            <a href="<?php echo Yii::app()->createUrl('user/login'); ?>">登录</a></br>
            <a href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a></br>
            <a href="<?php echo Yii::app()->createUrl('#'); ?>">忘记了密码？</a>
        </div>
    <?php endif;?>
</div>
<?php $this->endContent(); ?>