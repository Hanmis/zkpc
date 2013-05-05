<?php
$this->breadcrumbs=array(
	'Code Fragments',
);

$this->menu=array(
	array('label'=>'Create CodeFragment','url'=>array('create')),
	array('label'=>'Manage CodeFragment','url'=>array('admin')),
);
?>

<h1>Code Fragments</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
