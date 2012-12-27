<?php
$this->pageTitle=Yii::app()->name . ' - resetpwd';
$this->breadcrumbs=array(
	'重设密码',
);
?>
<h1 class="title">重设密码</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resetpwd-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->passwordField($model,'pwd'); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'确认密码'); ?>
		<?php echo $form->passwordField($model,'repwd'); ?>
		<?php echo $form->error($model,'repwd'); ?>
	</div>
    <?php echo $form->hiddenField($model, 'email', array('value'=>$model->email))?>

	<div class="row buttons">
		<label></label>
		<?php echo CHtml::submitButton('提交'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->