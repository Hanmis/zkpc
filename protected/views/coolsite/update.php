<?php
$this->breadcrumbs=array(
	'Coolsites'=>array('index'),
	$model->name=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coolsite', 'url'=>array('index')),
	array('label'=>'Create Coolsite', 'url'=>array('create')),
	array('label'=>'View Coolsite', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'Manage Coolsite', 'url'=>array('admin')),
);
?>

<h1>Update Coolsite <?php echo $model->cid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>