<?php
$this->breadcrumbs=array(
	'Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reply','url'=>array('index')),
	array('label'=>'Manage Reply','url'=>array('admin')),
);
?>

<h1>Create Reply</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>