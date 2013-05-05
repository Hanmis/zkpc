<?php
$this->breadcrumbs=array(
	'Coolsites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coolsite','url'=>array('index')),
	array('label'=>'Manage Coolsite','url'=>array('admin')),
);
?>

<h1>Create Coolsite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>