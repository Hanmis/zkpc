<?php
$this->breadcrumbs=array(
	'Coolsites',
);

$this->menu=array(
	array('label'=>'Create Coolsite', 'url'=>array('create')),
	array('label'=>'Manage Coolsite', 'url'=>array('admin')),
);
?>

<h1>Coolsites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
