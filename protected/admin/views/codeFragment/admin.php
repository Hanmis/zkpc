<?php
$this->breadcrumbs=array(
	'Code Fragments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CodeFragment','url'=>array('index')),
	array('label'=>'Create CodeFragment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('code-fragment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Code Fragments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'code-fragment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cfid',
		'intro',
		'code',
		'sort',
		'comments_count',
		'love_count',
		/*
		'created_at',
		'updated_at',
		'user_id',
		'cfu_id',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>