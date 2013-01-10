<?php
$this->breadcrumbs=array(
	'Coolsite Types',
);

$this->menu=array(
	array('label'=>'Create CoolsiteType', 'url'=>array('create')),
	array('label'=>'Manage CoolsiteType', 'url'=>array('admin')),
);
?>

<h1>Coolsite Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
