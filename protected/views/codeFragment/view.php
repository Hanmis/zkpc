<?php
$this->breadcrumbs=array(
	'Code Fragments'=>array('index'),
	$model->cfid,
);

$this->menu=array(
	array('label'=>'List CodeFragment', 'url'=>array('index')),
	array('label'=>'Create CodeFragment', 'url'=>array('create')),
	array('label'=>'Update CodeFragment', 'url'=>array('update', 'id'=>$model->cfid)),
	array('label'=>'Delete CodeFragment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cfid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodeFragment', 'url'=>array('admin')),
);
?>

<h1>View CodeFragment #<?php echo $model->cfid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cfid',
		'intro',
		'code',
		'sort',
		'comments_count',
		'love_count',
		'created_at',
		'updated_at',
		'user_id',
		'cfu_id',
	),
)); ?>
