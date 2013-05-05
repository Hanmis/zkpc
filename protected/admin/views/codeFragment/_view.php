<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cfid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cfid),array('view','id'=>$data->cfid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intro')); ?>:</b>
	<?php echo CHtml::encode($data->intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments_count')); ?>:</b>
	<?php echo CHtml::encode($data->comments_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('love_count')); ?>:</b>
	<?php echo CHtml::encode($data->love_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cfu_id')); ?>:</b>
	<?php echo CHtml::encode($data->cfu_id); ?>
	<br />

	*/ ?>

</div>