<?php
$this->breadcrumbs=array(
	'Code Fragments'=>array('index'),
	$model->cfid=>array('view','id'=>$model->cfid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeFragment', 'url'=>array('index')),
	array('label'=>'Create CodeFragment', 'url'=>array('create')),
	array('label'=>'View CodeFragment', 'url'=>array('view', 'id'=>$model->cfid)),
	array('label'=>'Manage CodeFragment', 'url'=>array('admin')),
);
?>

<h1>Update CodeFragment <?php echo $model->cfid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>