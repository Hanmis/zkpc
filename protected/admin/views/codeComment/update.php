<?php
$this->breadcrumbs=array(
	'Code Comments'=>array('index'),
	$model->ccid=>array('view','id'=>$model->ccid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeComment','url'=>array('index')),
	array('label'=>'Create CodeComment','url'=>array('create')),
	array('label'=>'View CodeComment','url'=>array('view','id'=>$model->ccid)),
	array('label'=>'Manage CodeComment','url'=>array('admin')),
);
?>

<h1>Update CodeComment <?php echo $model->ccid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>