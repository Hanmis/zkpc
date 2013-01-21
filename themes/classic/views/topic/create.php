<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'Create',
);
?>
<?php
    $this->widget('ext.ueditor.Ueditor',
            array(
                 'getId'=>'Topic_content',
                 'UEDITOR_HOME_URL'=>"/",
                 'options'=>'toolbars:[["fontfamily","fontsize","forecolor","bold","italic","strikethrough","|","insertunorderedlist","insertorderedlist","blockquote","|","link","unlink","highlightcode","|","undo","redo","source"]],
                  wordCount:false,
                 	 elementPathEnabled:false,
                 	 minFrameHeight:150,  //指定高度
                 	 imagePath:"",
                 	 initialContent:"",
                 	 ',
            ));
?>
<h1>Create Topic</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topic-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
    	<label>请选择分类：</label><br/>
        <?php echo CHtml::dropDownList('section_id', '', $sections, 
           array(
			'ajax'=>array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('Topic/getNode'),
				'update'=>'#node_id',
				'data'=>array('section_id'=>'js: this.value')
			),
			'prompt'=>'请选择分类'
		));?>
		<?php echo CHtml::dropDownList('node_id','',array());?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo CHtml::activeTextArea($model,'content', array('rows'=>5,'cols'=>89,'style'=>'width: 630px;padding: 5px;')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->