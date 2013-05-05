<?php
$this->breadcrumbs=array(
	'Coolsites'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Coolsite','url'=>array('index')),
	array('label'=>'Create Coolsite','url'=>array('create')),
	array('label'=>'Update Coolsite','url'=>array('update','id'=>$model->cid)),
	array('label'=>'Delete Coolsite','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->cid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coolsite','url'=>array('admin')),
);
?>

<h1>View Coolsite #<?php echo $model->cid; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'name',
		'favicon',
		'url',
		'state',
		'sort',
		'user_id',
		'ct_id',
	),
)); ?>
