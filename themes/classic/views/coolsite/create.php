<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-1
 * Time: 下午3:53
 * To change this template use File | Settings | File Templates.
 */
$this->breadcrumbs=array(
    '酷站'=>array('index'),
    '提交酷站'
);
?>
<div class="coolsite">
<h2 class="title">提交酷站</h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'coolsite-form',
    'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="topic_row">
        <?php echo $form->labelEx($model,'请选择酷站类型'); ?>
        <?php echo CHtml::dropDownList('ct_id','',$coolsiteTypes,array('style'=>'margin:10px 0 0 0'));?>
    </div>
	<div class="topic_row">
        <?php echo $form->labelEx($model,'名称'); ?>
        <?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>10)); ?>
    </div>
    <div class="topic_row">
        <?php echo $form->labelEx($model,'网站地址'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>32)); ?>
    </div>
	<div class="topic_row">
        <?php echo $form->labelEx($model,'网站图标'); ?>
        <?php echo $form->textField($model,'favicon',array('size'=>60,'maxlength'=>32)); ?>
    </div>
	<div class="topic_row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '提交' : '保存', array('class'=>'button orange')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>