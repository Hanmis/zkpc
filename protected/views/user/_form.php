<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_file_name'); ?>
		<?php echo $form->textField($model,'avatar_file_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'avatar_file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verified'); ?>
		<?php echo $form->textField($model,'verified'); ?>
		<?php echo $form->error($model,'verified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pwd'); ?>
		<?php echo $form->textField($model,'pwd',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pwd_salt'); ?>
		<?php echo $form->textField($model,'pwd_salt',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'pwd_salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'signature'); ?>
		<?php echo $form->textField($model,'signature',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'signature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_Intro'); ?>
		<?php echo $form->textArea($model,'p_Intro',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p_Intro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'persistence_token'); ?>
		<?php echo $form->textField($model,'persistence_token',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'persistence_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_count'); ?>
		<?php echo $form->textField($model,'login_count'); ?>
		<?php echo $form->error($model,'login_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'failed_login_count'); ?>
		<?php echo $form->textField($model,'failed_login_count'); ?>
		<?php echo $form->error($model,'failed_login_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login_at'); ?>
		<?php echo $form->textField($model,'last_login_at'); ?>
		<?php echo $form->error($model,'last_login_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_login_ip'); ?>
		<?php echo $form->textField($model,'current_login_ip',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'current_login_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login_ip'); ?>
		<?php echo $form->textField($model,'last_login_ip',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'last_login_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes_count'); ?>
		<?php echo $form->textField($model,'notes_count'); ?>
		<?php echo $form->error($model,'notes_count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->