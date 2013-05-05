<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Topic','url'=>array('index')),
	array('label'=>'Create Topic','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('topic-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Topics</h1>

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
	'id'=>'topic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tid',
		'title',
		'content',
		'state',
		'replies_count',
		'love_count',
		/*
		'last_reply_user_id',
		'replied_at',
		'source',
		'created_at',
		'updated_at',
		'node_id',
		'user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
