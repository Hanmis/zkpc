<?php
/* @var $this ReplyController */
/* @var $model Reply */

$this->breadcrumbs=array(
	'Replies'=>array('index'),
	$model->rid,
);

$this->menu=array(
	array('label'=>'List Reply', 'url'=>array('index')),
	array('label'=>'Create Reply', 'url'=>array('create')),
	array('label'=>'Update Reply', 'url'=>array('update', 'id'=>$model->rid)),
	array('label'=>'Delete Reply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reply', 'url'=>array('admin')),
);
?>

<h1>View Reply #<?php echo $model->rid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rid',
		'pid',
		'path',
		'content',
		'state',
		'source',
		'created_at',
		'updated_at',
		'topic_id',
		'user_id',
	),
)); ?>
