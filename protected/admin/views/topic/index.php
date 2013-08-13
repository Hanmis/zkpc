<?php
$this->breadcrumbs=array(
	'Topics',
);

$this->menu=array(
	array('label'=>'Create Topic','url'=>array('create')),
	array('label'=>'Manage Topic','url'=>array('admin')),
);
?>

<h1>Topics</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>