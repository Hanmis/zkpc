<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Topic','url'=>array('index')),
	array('label'=>'Create Topic','url'=>array('create')),
	array('label'=>'Update Topic','url'=>array('update','id'=>$model->tid)),
	array('label'=>'Delete Topic','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->tid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Topic','url'=>array('admin')),
);
?>

<h1>View Topic #<?php echo $model->tid; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'tid',
		'title',
		'content',
		'state',
		'replies_count',
		'love_count',
		'last_reply_user_id',
		'replied_at',
		'source',
		'created_at',
		'updated_at',
		'node_id',
		'user_id',
	),
)); ?>
