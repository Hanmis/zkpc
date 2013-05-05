<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo '后台管理系统' ?></title>
</head>

<body>

<div class="container" id="page">

<!--	<div id="header">-->
<!--		<div id="logo">--><?php //echo CHtml::encode(Yii::app()->name); ?><!--</div>-->
<!--	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'编程社区后台管理系统', 'url'=>array('/admin/index')),
				array('label'=>'节点类型', 'url'=>array('/Section')),
                array('label'=>'节点', 'url'=>array('/Node')),
                array('label'=>'话题', 'url'=>array('/Topic')),
                array('label'=>'话题回复', 'url'=>array('/Reply')),
                array('label'=>'编程语言', 'url'=>array('/ProgrammingLanguage')),
                array('label'=>'代码类型', 'url'=>array('/CodeType')),
                array('label'=>'代码功能', 'url'=>array('/CodeFunction')),
                array('label'=>'代码片段', 'url'=>array('/CodeFragment')),
                array('label'=>'代码评论', 'url'=>array('/CodeComment')),
                array('label'=>'酷站类型', 'url'=>array('/CoolsiteType')),
                array('label'=>'酷站', 'url'=>array('/Coolsite')),
                array('label'=>'会员', 'url'=>array('/User')),

//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'注销 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
