<?php
$this->breadcrumbs=array(
	'Code Comments',
);

$this->menu=array(
	array('label'=>'Create CodeComment', 'url'=>array('create')),
	array('label'=>'Manage CodeComment', 'url'=>array('admin')),
);
?>

<h1>Code Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
