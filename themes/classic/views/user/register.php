<?php
/* @var $this UserController*/
/* @var $model User*/
/* @var $form CActiveForm*/

$this->pageTitle = Yii::app()->name.'- register';
$this->breadcrumbs=array(
	'注册',
);
?>
<div class="column2_content">
<h1 class="title">注册</h1>
<!--form begin-->
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'用户名'); ?>
        <?php echo $form->textField($model,'username',array('maxlength'=>64)); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'名字'); ?>
        <?php echo $form->textField($model,'name',array('maxlength'=>64)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Email'); ?>
        <?php echo $form->textField($model,'email',array('maxlength'=>128)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'密码'); ?>
        <?php echo $form->passwordField($model,'pwd',array('maxlength'=>128)); ?>
        <?php echo $form->error($model,'pwd'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'确认密码'); ?>
        <?php echo $form->passwordField($model, 'repwd',array('maxlength'=>128)); ?>
        <?php echo $form->error($model,'repwd'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">
        <?php echo $form->labelEx($model,'验证码'); ?>

            <?php echo $form->textField($model,'verifyCode',array('size'=>5)); ?>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->error($model,'verifyCode'); ?>


    </div>
    <?php endif; ?>

    <div class="row buttons">
        <label></label>
        <?php echo CHtml::submitButton('注册',array('class'=>'button orange')); ?>
    </div>
    <?php $this->endWidget(); ?>

</div>
<!-- form end-->
</div>
<div class="column2_sidebar">
    <h2 class="title">已经有帐号了？</h2>
    <a href="<?php echo Yii::app()->createUrl('user/login'); ?>">登录</a></br>
    <a href="<?php echo Yii::app()->createUrl('user/findPwd'); ?>">忘记了密码？</a>
</div>