<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'发布主题',
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
<div class="column2_content">
<h1 class="title">发布主题</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'topic-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
)); ?>
	<?php echo $form->errorSummary($model); ?>
    <div class="topic_row">
    	<label>请选择节点分类：</label>
        <div style="margin: 10px 0 0 0;">
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
    </div>
	<div class="topic_row">
		<?php echo $form->labelEx($model,'主题'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>64, 'style'=>'width:400px; margin:10px 0 10px 0')); ?>
	</div>

	<div class="topic_row">
		<?php echo $form->labelEx($model,'内容'); ?>
		<?php echo CHtml::activeTextArea($model,'content', array('rows'=>5,'cols'=>89,'style'=>'margin:10px 0 10px -5px; width: 630px;padding: 5px;')); ?>
	</div>

	<div class="topic_row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '发布' : '保存', array('class'=>'button orange')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<div class="column2_sidebar">
    <h2 class="title">发布主题</h2>
    <a href="<?php echo Yii::app()->createUrl('Topic/create'); ?>">发布主题</a></br>
</div><!--右边栏结束-->
