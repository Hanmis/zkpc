<?php

$this->breadcrumbs=array(
    '我的主页',
);
?>

<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        '个人信息'=>$this->renderPartial('_view', array('model'=>$model), true),
        '帖子'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
        '收藏'=>array('content'=>'Content for tab 2', 'id'=>'tab3'),
        // panel 3 contains the content rendered by a partial view
        //'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));?>