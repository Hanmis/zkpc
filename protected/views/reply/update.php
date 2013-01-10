<?php
/* @var $this ReplyController */
/* @var $model Reply */

$this->breadcrumbs=array(
	'Replies'=>array('index'),
	$model->rid=>array('view','id'=>$model->rid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reply', 'url'=>array('index')),
	array('label'=>'Create Reply', 'url'=>array('create')),
	array('label'=>'View Reply', 'url'=>array('view', 'id'=>$model->rid)),
	array('label'=>'Manage Reply', 'url'=>array('admin')),
);
?>

<h1>Update Reply <?php echo $model->rid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>