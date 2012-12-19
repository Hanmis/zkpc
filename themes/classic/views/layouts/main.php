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
    <!-- myself css-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/top_nav.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/index.css "/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/user.css "/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript">
        function getUserMenu(){
            document.getElementById("dropdown-menu").style.display="inline";
        }
        function moverUserMenu(){
            document.getElementById("dropdown-menu").style.display="none";
        }
    </script>
</head>

<body onclick="moverUserMenu();">

<div>
    <!--头部导航开始-->
    <div class="top_nav">
        <div class="top_nav_nei">
            <ul class="nav black">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">网站logo</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/post'); ?>">社区</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/wiki'); ?>">Wiki</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/cool')?>">酷站</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/member'); ?>">会员</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/share'); ?>">代码分享</a></li>
                <li class="right"><a href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a></li>
                <li class="right">
                    <?php if(Yii::app()->user->isGuest):?>
                        <a href="<?php echo Yii::app()->createUrl('user/login'); ?>">登录</a>
                    <?php endif;?>
                    <?php if(!Yii::app()->user->isGuest):?>
                    <?php echo CHtml::link(Yii::app()->user->name, '#',array(
                        'onmouseover'=>'getUserMenu();',
                    ))?>
                    <ul id="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->createUrl('user/view')?>">我的主页</a></li>
                        <li><a>记事本</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('user/logout')?>">注销</a></li>
                    </ul>
                    <?php endif;?>
                </li>
            </ul>
        </div>
    </div>
    <!--头部导航结束-->
    <!-- breadcrumbs begin-->
    <p></p>
    <?php if(isset($this->breadcrumbs) && $this->breadcrumbs != null){
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'htmlOptions' => array('class'=>'content_nav'),
                ));
                } else {
                    echo "<div class='content_nav'>Home </div>";
                }
    ?>
    <!-- breadcrumbs end-->
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
