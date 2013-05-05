<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 
?>
    <div class="row" style="text-align: center;">
    <h2 style="color: #abff5d;">社区后台管理系统</h2>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'用户名'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'input')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->passwordField($model,'pwd',array('class'=>'input')); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>
<!--    <div class="row">-->
<!--        <div class="left rememberMe"style="margin-top: 6px;" >-->
<!--            --><?php //echo $form->checkBox($model,'rememberMe'); ?>
<!--            --><?php //echo $form->label($model,'rememberMe'); ?>
<!--            --><?php //echo $form->error($model,'rememberMe'); ?>
<!--        </div>-->

        <div class="left buttons" style="margin-left: 230px;" >
            <?php $this->widget('bootstrap.widgets.BootButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>Yii::t('backend', 'Login'),
                'loadingText'=>'Login...',
                'htmlOptions'=>array('id'=>'buttonStateful'),
            )); ?>
        </div>
        <div class="clear"></div>
    </div>
<div class="row" style="margin-left: 8px; padding-top: 10px;">
    <p id="backtoblog"><?php echo CHtml::link('← 回到社区', Yii::app()->request->baseUrl, array('title'=>'不知道自己在哪？')) ?></p>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
