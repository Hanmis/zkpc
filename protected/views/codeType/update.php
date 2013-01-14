<?php
$this->breadcrumbs=array(
	'Code Types'=>array('index'),
	$model->name=>array('view','id'=>$model->ctid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeType', 'url'=>array('index')),
	array('label'=>'Create CodeType', 'url'=>array('create')),
	array('label'=>'View CodeType', 'url'=>array('view', 'id'=>$model->ctid)),
	array('label'=>'Manage CodeType', 'url'=>array('admin')),
);
?>

<h1>Update CodeType <?php echo $model->ctid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>