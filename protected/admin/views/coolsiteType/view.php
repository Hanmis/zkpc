<?php
$this->breadcrumbs=array(
	'Coolsite Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CoolsiteType','url'=>array('index')),
	array('label'=>'Create CoolsiteType','url'=>array('create')),
	array('label'=>'Update CoolsiteType','url'=>array('update','id'=>$model->ctid)),
	array('label'=>'Delete CoolsiteType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ctid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoolsiteType','url'=>array('admin')),
);
?>

<h1>View CoolsiteType #<?php echo $model->ctid; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ctid',
		'name',
		'state',
		'sort',
	),
)); ?>
