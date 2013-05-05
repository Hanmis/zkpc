<?php
/* @var $this ProgrammingLanguageController */
/* @var $data ProgrammingLanguage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('plid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->plid), array('view', 'id'=>$data->plid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('highlighted')); ?>:</b>
	<?php echo CHtml::encode($data->highlighted); ?>
	<br />


</div>