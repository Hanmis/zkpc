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
    <script type="text/javascript">
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
            gotop.style.background = 'gray';
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
		Copyright &copy; <?php echo date('Y'); ?> by myself.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
