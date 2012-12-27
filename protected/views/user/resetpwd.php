<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resetpwd-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->textField($model,'pwd'); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'确认密码'); ?>
		<?php echo $form->textField($model,'repwd'); ?>
		<?php echo $form->error($model,'repwd'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->