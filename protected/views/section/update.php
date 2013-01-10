<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->name=>array('view','id'=>$model->sid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Section', 'url'=>array('index')),
	array('label'=>'Create Section', 'url'=>array('create')),
	array('label'=>'View Section', 'url'=>array('view', 'id'=>$model->sid)),
	array('label'=>'Manage Section', 'url'=>array('admin')),
);
?>

<h1>Update Section <?php echo $model->sid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>