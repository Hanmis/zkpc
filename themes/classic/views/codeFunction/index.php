<?php
/* @var $this codeFragmentController */
/* @var $model codeType */

$this->breadcrumbs=array(
    '代码片段'=>array('index'),
);
?>
<!--代码片段开始-->
<div class="column2_content">
<!--代码语言开始-->

<!--代码语言结束-->

<!--列表开始-->
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$cfudataProvider,
	'itemView'=>'_view',
	'ajaxUpdate'=>false,
)); ?>
<!--列表结束-->
</div><!--代码片段结束-->