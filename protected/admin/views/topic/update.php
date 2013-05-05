<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->title=>array('view','id'=>$model->tid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Topic','url'=>array('index')),
	array('label'=>'Create Topic','url'=>array('create')),
	array('label'=>'View Topic','url'=>array('view','id'=>$model->tid)),
	array('label'=>'Manage Topic','url'=>array('admin')),
);
?>

<h1>Update Topic <?php echo $model->tid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>