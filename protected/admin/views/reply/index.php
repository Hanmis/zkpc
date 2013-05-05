<?php
$this->breadcrumbs=array(
	'Replies',
);

$this->menu=array(
	array('label'=>'Create Reply','url'=>array('create')),
	array('label'=>'Manage Reply','url'=>array('admin')),
);
?>

<h1>Replies</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
