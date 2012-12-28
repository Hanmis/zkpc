<?php
/* @var $this UserController */
/* @var $model ResetPwdForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - findpwd';
$this->breadcrumbs=array(
	'找回密码',
);
?>
<h1 class="title">找回密码</h1>
<!--form begin-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'findpwd-form',
	'enableClientValidation'=>false,
)); ?>

    <div class="row">
        *此功能将会发送一个找回密码的特别链接到你的邮箱，通过改链接可以进入重置密码的页面
    </div>
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

</div>
<!-- form end-->