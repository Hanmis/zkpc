<?php
$this->breadcrumbs=array(
	'Code Comments'=>array('index'),
	$model->ccid,
);

$this->menu=array(
	array('label'=>'List CodeComment', 'url'=>array('index')),
	array('label'=>'Create CodeComment', 'url'=>array('create')),
	array('label'=>'Update CodeComment', 'url'=>array('update', 'id'=>$model->ccid)),
	array('label'=>'Delete CodeComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ccid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodeComment', 'url'=>array('admin')),
);
?>

<h1>View CodeComment #<?php echo $model->ccid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ccid',
		'content',
		'created_at',
		'updated_at',
		'cfr_id',
		'user_id',
	),
)); ?>
