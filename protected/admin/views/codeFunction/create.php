<?php
$this->breadcrumbs=array(
	'Code Functions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodeFunction','url'=>array('index')),
	array('label'=>'Manage CodeFunction','url'=>array('admin')),
);
?>

<h1>Create CodeFunction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>