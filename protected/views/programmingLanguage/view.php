<?php
$this->breadcrumbs=array(
	'Programming Languages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProgrammingLanguage', 'url'=>array('index')),
	array('label'=>'Create ProgrammingLanguage', 'url'=>array('create')),
	array('label'=>'Update ProgrammingLanguage', 'url'=>array('update', 'id'=>$model->plid)),
	array('label'=>'Delete ProgrammingLanguage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->plid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProgrammingLanguage', 'url'=>array('admin')),
);
?>

<h1>View ProgrammingLanguage #<?php echo $model->plid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'plid',
		'name',
		'state',
		'sort',
	),
)); ?>
