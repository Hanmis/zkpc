<?php
$this->breadcrumbs=array(
	'Coolsite Types'=>array('index'),
	$model->name=>array('view','id'=>$model->ctid),
	'Update',
);

$this->menu=array(
	array('label'=>'List CoolsiteType','url'=>array('index')),
	array('label'=>'Create CoolsiteType','url'=>array('create')),
	array('label'=>'View CoolsiteType','url'=>array('view','id'=>$model->ctid)),
	array('label'=>'Manage CoolsiteType','url'=>array('admin')),
);
?>

<h1>Update CoolsiteType <?php echo $model->ctid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>