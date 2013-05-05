<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-1
 * Time: 下午10:45
 * To change this template use File | Settings | File Templates.
 */
$this->pageTitle = Yii::app()->name.'- update';
$this->breadcrumbs=array(
    '个人资料设置',
);
?>
<div class="column2_content">
    <h1 class="title">个人资料设置</h1>

    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'用户名'); ?>
        <?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>64, 'disabled'=>'disabled')); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'邮箱'); ?>
        <?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>128, 'disabled'=>'disabled')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'昵称'); ?>
        <?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>64)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'个人主页'); ?>
        <?php echo $form->textField($model,'website',array('size'=>40,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'website'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'签名'); ?>
        <?php echo $form->textField($model,'signature',array('size'=>40,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'signature'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'个人介绍'); ?>
        <?php echo $form->textArea($model,'p_Intro',array('rows'=>6, 'cols'=>50, 'style'=>'width:350px; margin: 0 0 0 30px;')); ?>
        <?php echo $form->error($model,'p_Intro'); ?>
    </div>


    <div class="row buttons">
        <label></label>
        <?php echo CHtml::submitButton('更新资料',array('class'=>'button orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
<div class="column2_sidebar" style="text-align:center;">
    <a>
        <img class="uface" style="width:120px;height:120px;" src="<?php echo  User::get_gravatar($model->email,120);?>" alt="4136">
    </a>
    <br>
    如需修改头像，请进入
    <a href="http://www.gravatar.com">gravatar.com</a>
</div>
<div class="column2_content">
    <h1 class="title">重设密码</h1>
    <!--form begin-->
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'resetpwd-form',
        'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
    )); ?>
        <?php echo $form->errorSummary($model2); ?>
        <div class="row">
            <?php echo $form->labelEx($model2,'旧密码'); ?>
            <?php echo $form->passwordField($model2,'oldpwd'); ?>
            <?php echo $form->error($model2,'oldpwd'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model2,'密码'); ?>
            <?php echo $form->passwordField($model2,'pwd'); ?>
            <?php echo $form->error($model2,'pwd'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model2,'确认密码'); ?>
            <?php echo $form->passwordField($model2,'repwd'); ?>
            <?php echo $form->error($model2,'repwd'); ?>
        </div>

        <div class="row buttons">
            <label></label>
            <?php echo CHtml::submitButton('修改密码', array('class'=>'button orange')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>
    <!-- form end-->
</div>
