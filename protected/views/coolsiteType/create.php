<?php
$this->breadcrumbs=array(
	'Coolsite Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CoolsiteType', 'url'=>array('index')),
	array('label'=>'Manage CoolsiteType', 'url'=>array('admin')),
);
?>

<h1>Create CoolsiteType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>