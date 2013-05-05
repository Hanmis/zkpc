<?php
$this->breadcrumbs=array(
	'Code Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodeComment','url'=>array('index')),
	array('label'=>'Manage CodeComment','url'=>array('admin')),
);
?>

<h1>Create CodeComment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>