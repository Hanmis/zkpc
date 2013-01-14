<?php
$this->breadcrumbs=array(
	'Code Fragments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodeFragment', 'url'=>array('index')),
	array('label'=>'Manage CodeFragment', 'url'=>array('admin')),
);
?>

<h1>Create CodeFragment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>