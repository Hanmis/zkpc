<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->uid),array('view','id'=>$data->uid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar_file_name')); ?>:</b>
	<?php echo CHtml::encode($data->avatar_file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verified')); ?>:</b>
	<?php echo CHtml::encode($data->verified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd')); ?>:</b>
	<?php echo CHtml::encode($data->pwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd_salt')); ?>:</b>
	<?php echo CHtml::encode($data->pwd_salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('signature')); ?>:</b>
	<?php echo CHtml::encode($data->signature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_Intro')); ?>:</b>
	<?php echo CHtml::encode($data->p_Intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persistence_token')); ?>:</b>
	<?php echo CHtml::encode($data->persistence_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_count')); ?>:</b>
	<?php echo CHtml::encode($data->login_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('failed_login_count')); ?>:</b>
	<?php echo CHtml::encode($data->failed_login_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_at')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_login_ip')); ?>:</b>
	<?php echo CHtml::encode($data->current_login_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login_ip')); ?>:</b>
	<?php echo CHtml::encode($data->last_login_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes_count')); ?>:</b>
	<?php echo CHtml::encode($data->notes_count); ?>
	<br />

	*/ ?>

</div>