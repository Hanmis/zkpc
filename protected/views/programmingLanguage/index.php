<?php
$this->breadcrumbs=array(
	'Programming Languages',
);

$this->menu=array(
	array('label'=>'Create ProgrammingLanguage', 'url'=>array('create')),
	array('label'=>'Manage ProgrammingLanguage', 'url'=>array('admin')),
);
?>

<h1>Programming Languages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
