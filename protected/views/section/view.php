<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'Update Section', 'url'=>array('update', 'id'=>$model->sid)),
	array('label'=>'Delete Section', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>View Section #<?php echo $model->sid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sid',
		'name',
		'state',
		'sort',
	),
)); ?>
