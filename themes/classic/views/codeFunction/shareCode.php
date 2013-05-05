<?php
/* @var $this CodeFunctionController */
/* @var $model ShareCodeForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - sharecode';
$this->breadcrumbs=array(
    '代码片段'=>array('index'),
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
                 	 minFrameHeight:100,  //指定高度
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
	'enableClientValidation'=>ture,
)); ?>
	<?php echo $form->errorSummary($model); ?>
    <?php if (!isset($codeFunctionId)):?>
        <div class="share_row">
            <label>请选择编程的语言和分类：</label>
            <div style="margin: 10px 0 0 0;">
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
        </div>
        <div class="share_row">
            <?php echo $form->labelEx($model,'一句话概述代码的用途：（例：使用 jsoup 从 HTML 中提取所有链接的例子）'); ?>
            <?php echo $form->textField($model,'title', array('style'=>'width:250px; margin:10px 0 10px 0')); ?>
        </div>
    <?php else:?>
        <div class="share_row">
           <h5>代码用途：</h5>
           <h4><?php echo $cfuTitle?></h4>
        </div>
    <?php endif;?>
    <div class="share_row">
    	<?php echo $form->labelEx($model,'简单介绍：例如代码出处、适用的平台、所依赖的项目等等（可选）'); ?>
    	<?php echo CHtml::activeTextArea($model,'intro', array('rows'=>5,'cols'=>89,'style'=>'margin:10px 0 10px -5px; width: 630px;padding: 5px;')); ?>
    </div>
    <div class="share_row">
    	<?php echo $form->labelEx($model, '粘贴代码处'); ?>
    	<?php echo $form->textArea($model, 'code', array('rows'=>5, 'cols'=>89, 'style'=>'width:50%;height:200px; margin:20px 0 0 0')); ?>
    </div>
	<div class="share_row buttons">
        <label></label>
		<?php echo CHtml::submitButton('分享',array('class'=>'button orange')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form end-->