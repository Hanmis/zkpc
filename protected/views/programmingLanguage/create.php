<?php
/* @var $this ProgrammingLanguageController */
/* @var $model ProgrammingLanguage */

$this->breadcrumbs=array(
	'Programming Languages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProgrammingLanguage', 'url'=>array('index')),
	array('label'=>'Manage ProgrammingLanguage', 'url'=>array('admin')),
);
?>

<h1>Create ProgrammingLanguage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>