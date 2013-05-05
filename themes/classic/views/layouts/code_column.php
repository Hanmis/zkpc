<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/code/sharecode.css"/>
<?php
/**
 * @这是code两列的布局，渲染到main.php主布局文件中去
 */
?>
<?php $this->beginContent('/layouts/main'); ?>
<p></p>

<div class="container">
	   <div class="column2_content">
       <?php echo $content;?>
       </div>
       <div class="column2_sidebar">
               <h2 class="title">分享代码</h2>
               <?php if(!Yii::app()->user->isGuest):?>
               <a href="<?php echo Yii::app()->createUrl('codeFunction/shareCode'); ?>">分享代码</a></br>
               <?php if ($this->getCodeFunctionId()):?>
                    <a href="<?php echo Yii::app()->createUrl('codeFunction/shareCode', array('codeFunctionId'=>$this->getCodeFunctionId())); ?>">我有更好的代码</a>
               <?php endif;?>
           <?php else:?>
               <a class="button green" href="<?php echo Yii::app()->createUrl('User/login')?>">会员登录后可以分享代码</a>
           <?php endif?>
       </div>
</div>


<?php $this->endContent(); ?>