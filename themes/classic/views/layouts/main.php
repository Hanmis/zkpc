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

        function gotoTop(width)
        {
            document.write('<a id="goto-top">^^</a>');
            var gotop = document.querySelector('#goto-top');
            /* 默认情况下CSS属性的设置 */
            gotop.style.visibility='hidden';
            gotop.style.cursor='pointer';
            gotop.style.position = 'fixed';
            gotop.style.fontSize='2.5em';
            gotop.style.fontWeight='900';
            gotop.style.textAlign='center';
            gotop.style.background = 'black';
            gotop.style.borderRadius = '0.2em';
            gotop.style.width='1.4em';
            gotop.style.height='1em';
            gotop.style.top = (document.documentElement.clientHeight / 2) + 100 + 'px';
            gotop.style.opacity='0.3';
            gotop.style.visibility = (document.body.scrollTop + document.documentElement.scrollTop > 10) ? 'visible' : 'hidden';
            if(0 == width)
            { gotop.style.left = '0em';  }
            else if(-1 == width)
            { gotop.style.right = '0em';  }
            else
            {
                var resize = function()
                {
                    var left = (document.documentElement.clientWidth - width) / 2 + width + 10;
                    if((left - gotop.clientWidth) < width)
                    {
                        gotop.style.right='0em';
                        gotop.style.left = null;  // 设定了right属性，则需要取消left属性。
                    }
                    else
                    {
                        gotop.style.left = left + 'px';
                        gotop.style.right = null;
                    }
                };
                resize();
                window.addEventListener('resize', function()
                {
                    resize();
                }, false);

            }
            gotop.addEventListener('mouseover', function()
            {
                this.style.opacity='0.8';
                this.style.textDecoration='none';
            }, false);
            gotop.addEventListener('mouseout', function()
            {
                this.style.opacity='0.3';
            }, false);
            gotop.addEventListener('click', function()
            {
                // IE9和opera下body.scrollTop为0，chrome下documentElement.scrollTop为0
                // 两者始终有一个为0
                var h = document.body.scrollTop + document.documentElement.scrollTop; // 当前位置
                var t = window.setInterval(function()
                {
                    window.scrollTo(0,h -= 100); // 每次上移100像素
                    if(h <= 0)
                    { window.clearInterval(t);  }
                }, 5);
            }, false);
            /* 通过window.onscroll事件确定按钮是否需要显示 */
            window.addEventListener('scroll', function()
            {
                var scrollTop = document.body.scrollTop + document.documentElement.scrollTop;
                gotop.style.visibility = scrollTop > 10 ? 'visible':'hidden';
            }, false);
        };
        gotoTop(950);
    </script>

</head>

<body background="../../images/background.jpg" onclick="moverUserMenu();">

<div>
    <!--头部导航开始-->
    <div class="top_nav">
        <div class="top_nav_nei">
            <ul class="nav black">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">首页</a></li>
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
<!--    <a class="go_top" href="#" style="display: inline;">
        <i class="icon icons_go_top"></i>
    </a>-->
	<!--页面内容结束-->
	<div class="clear"></div>
	
	<!-- footer begin-->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by liuhanming..<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?><a href="https://github.com/Hanmis/zkpc">github</a>
	</div>
	<!-- footer end-->

</div><!-- page -->

</body>
</html>
