<?php
/* @var $this TopicController */
/* @var $data Topic */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tid), array('view', 'id'=>$data->tid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('replies_count')); ?>:</b>
	<?php echo CHtml::encode($data->replies_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_reply_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->last_reply_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('replied_at')); ?>:</b>
	<?php echo CHtml::encode($data->replied_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('source')); ?>:</b>
	<?php echo CHtml::encode($data->source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
	<?php echo CHtml::encode($data->node_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>