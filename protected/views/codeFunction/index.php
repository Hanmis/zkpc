<?php
$this->breadcrumbs=array(
	'Code Functions',
);

$this->menu=array(
	array('label'=>'Create CodeFunction', 'url'=>array('create')),
	array('label'=>'Manage CodeFunction', 'url'=>array('admin')),
);
?>

<h1>Code Functions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
