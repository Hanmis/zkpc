<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<h1 class="title">登录</h1>
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
		<?php echo CHtml::submitButton('登录',array('class'=>'buttonlink loginbutton')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
