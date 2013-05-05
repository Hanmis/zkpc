<?php
/* @var $this ProgrammingLanguageController */
/* @var $model ProgrammingLanguage */

$this->breadcrumbs=array(
	'Programming Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->plid),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProgrammingLanguage', 'url'=>array('index')),
	array('label'=>'Create ProgrammingLanguage', 'url'=>array('create')),
	array('label'=>'View ProgrammingLanguage', 'url'=>array('view', 'id'=>$model->plid)),
	array('label'=>'Manage ProgrammingLanguage', 'url'=>array('admin')),
);
?>

<h1>Update ProgrammingLanguage <?php echo $model->plid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>