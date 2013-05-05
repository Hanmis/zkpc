<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Update User','url'=>array('update','id'=>$model->uid)),
	array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->uid; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'username',
		'email',
		'name',
		'avatar_file_name',
		'verified',
		'state',
		'website',
		'created_at',
		'updated_at',
		'pwd',
		'pwd_salt',
		'signature',
		'p_Intro',
		'persistence_token',
		'login_count',
		'failed_login_count',
		'last_login_at',
		'current_login_ip',
		'last_login_ip',
		'notes_count',
	),
)); ?>
