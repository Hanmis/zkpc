<?php

$this->breadcrumbs=array(
    '我的主页',
);
?>
<div class="column2_content">
<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        '个人信息'=>$this->renderPartial('_view', array('model'=>$model), true),
        '帖子'=>$this->renderPartial('_view_topic', array('topic'=>$topic), true),
        '代码'=>$this->renderPartial('_view_codefragment', array('codeFragment'=>$codeFragment), true),
        // panel 3 contains the content rendered by a partial view
        //'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));?>
</div>

