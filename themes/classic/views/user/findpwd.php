<?php
$this->pageTitle=Yii::app()->name . ' - findpwd';
$this->breadcrumbs=array(
	'找回密码',
);
?>
<h1 class="title">找回密码</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'findpwd-form',
	'enableClientValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'注册邮箱'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row buttons">
        <label></label>
		<?php echo CHtml::submitButton('提交',array('class'=>'buttonlink loginbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->