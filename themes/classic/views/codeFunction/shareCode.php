<?php
/* @var $this CodeFunctionController */
/* @var $model ShareCodeForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - sharecode';
$this->breadcrumbs=array(
	'分享代码片段',
);
?>
<h1 class="title">分享代码片段</h1>
<!--form begin-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sharecode-form',
	'enableClientValidation'=>false,
)); ?>

    <div class="row">
        <?php echo CHtml::dropDownList('pl_id', '', $pls, 
           array(
			'ajax'=>array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('CodeFunction/getCodeType'),
				'update'=>'#ct_id',
				'data'=>array('pl_id'=>'js: this.value')
			),
			'prompt'=>'请选择编程语言'
		));?>
		<?php echo CHtml::dropDownList('ct_id','',array());?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>


	<div class="row buttons">
        <label></label>
		<?php echo CHtml::submitButton('提交',array('class'=>'buttonlink loginbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form end-->