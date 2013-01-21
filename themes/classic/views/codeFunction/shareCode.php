<?php
/* @var $this CodeFunctionController */
/* @var $model ShareCodeForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - sharecode';
$this->breadcrumbs=array(
	'分享代码片段',
);
?>
<?php
    $this->widget('ext.ueditor.Ueditor',
            array(
                 'getId'=>'SharecodeForm_intro',
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
<h1 class="title">分享代码片段</h1>
<!--form begin-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sharecode-form',
	'enableClientValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
    	<label>请选择编程的语言和分类：</label><br/>
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
		<?php echo $form->labelEx($model,'一句话概述代码的用途：（例：使用 jsoup 从 HTML 中提取所有链接的例子）'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    <div class="row">
    	<?php echo $form->labelEx($model,'简单介绍：例如代码出处、适用的平台、所依赖的项目等等（可选）'); ?>
    	<?php echo CHtml::activeTextArea($model,'intro', array('rows'=>5,'cols'=>89,'style'=>'width: 630px;padding: 5px;')); ?>
    	<?php echo $form->error($model,'intro'); ?>
    </div>
    <div class="row">
    	<?php echo $form->labelEx($model, '粘贴代码处'); ?>
    	<?php echo $form->textArea($model, 'code'); ?>
    	<?php echo $form->error($model, 'code'); ?>
    </div>
	<div class="row buttons">
        <label></label>
		<?php echo CHtml::submitButton('提交',array('class'=>'buttonlink loginbutton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form end-->