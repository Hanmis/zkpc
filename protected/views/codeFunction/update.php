<?php
$this->breadcrumbs=array(
	'Code Functions'=>array('index'),
	$model->title=>array('view','id'=>$model->cfid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeFunction', 'url'=>array('index')),
	array('label'=>'Create CodeFunction', 'url'=>array('create')),
	array('label'=>'View CodeFunction', 'url'=>array('view', 'id'=>$model->cfid)),
	array('label'=>'Manage CodeFunction', 'url'=>array('admin')),
);
?>

<h1>Update CodeFunction <?php echo $model->cfid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>