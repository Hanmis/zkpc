<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'登录',
);
?>
<div class="column2_content">
<h1 class="title">登录</h1>
<!--form begin-->
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'用户名'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->passwordField($model,'pwd'); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>

	<div class="row rememberMe">
        <label></label>
        <input id="ytLoginForm_rememberMe" type="hidden" name="LoginForm[rememberMe]" value="0">
        <input id="LoginForm_rememberMe" type="checkbox" value="1" name="LoginForm[rememberMe]">
        记住登录状态
        <?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
        <label></label>
		<?php echo CHtml::submitButton('登录',array('class'=>'button orange')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
<!-- form end-->
</div>
<div class="column2_sidebar">
    <h2 class="title">还没有帐号？</h2>
    <a href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a></br>
    <a href="<?php echo Yii::app()->createUrl('user/findPwd'); ?>">忘记了密码？</a>
</div>
<!--<div class="column2_sidebar">-->
<!--    <h2 class="title">用其他平台帐号登录</h2>-->
<!--</div>-->