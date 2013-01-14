<?php
$this->breadcrumbs=array(
	'Code Functions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CodeFunction', 'url'=>array('index')),
	array('label'=>'Create CodeFunction', 'url'=>array('create')),
	array('label'=>'Update CodeFunction', 'url'=>array('update', 'id'=>$model->cfid)),
	array('label'=>'Delete CodeFunction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cfid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodeFunction', 'url'=>array('admin')),
);
?>

<h1>View CodeFunction #<?php echo $model->cfid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cfid',
		'title',
		'sort',
		'read_count',
		'created_at',
		'updated_at',
		'ct_id',
		'pl_id',
	),
)); ?>
