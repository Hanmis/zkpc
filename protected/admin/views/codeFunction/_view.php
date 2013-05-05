<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cfid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cfid),array('view','id'=>$data->cfid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('read_count')); ?>:</b>
	<?php echo CHtml::encode($data->read_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ct_id')); ?>:</b>
	<?php echo CHtml::encode($data->ct_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pl_id')); ?>:</b>
	<?php echo CHtml::encode($data->pl_id); ?>
	<br />

	*/ ?>

</div>