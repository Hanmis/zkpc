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
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/top_nav.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/index.css "/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/user.css "/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/topic.css"/>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript">
    	//用户下拉框js
        function getUserMenu(){
            document.getElementById("dropdown-menu").style.display="inline";
        }
        function moverUserMenu(){
            document.getElementById("dropdown-menu").style.display="none";
        }
    </script>

</head>

<body background="../../images/background.jpg" onclick="moverUserMenu();">

<div>
    <!--头部导航开始-->
    <div class="top_nav">
        <div class="top_nav_nei">
            <ul class="nav black">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">网站logo</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('topic'); ?>">社区</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('coolsite')?>">酷站</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('site/member'); ?>">会员</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('codeFunction'); ?>">代码片段</a></li>
                <li class="right">
                    <?php if(Yii::app()->user->isGuest):?>
                    <a href="<?php echo Yii::app()->createUrl('user/register'); ?>">注册</a></li>
                    <?php endif;?>
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
                        <li><a href="<?php echo Yii::app()->createUrl('user/update')?>">个人资料设置</a></li>
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
    <!--消息框-->
    <?php
    if(Yii::app()->user->hasFlash('success')){
        Helper::getToastMessage($this, Yii::app()->user->getFlash('success'), 'success');
    }
    if(Yii::app()->user->hasFlash('error')){
        Helper::getToastMessage($this, Yii::app()->user->getFlash('error'), 'error');
    }
    if(Yii::app()->user->hasFlash('notice')){
        Helper::getToastMessage($this, Yii::app()->user->getFlash('notice'), 'notice');
    }
    if(Yii::app()->user->hasFlash('warning')){
        Helper::getToastMessage($this, Yii::app()->user->getFlash('warning'), 'warning');
    }
    ?>
    <!--消息框结束-->
    <!--页面内容开始-->
	<?php echo $content; ?>
	<!--页面内容结束-->
	<div class="clear"></div>
	
	<!-- footer begin-->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
	<!-- footer end-->

</div><!-- page -->

</body>
</html>
