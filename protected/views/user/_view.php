<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id), array('view', 'id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relation')); ?>:</b>
	<?php echo CHtml::encode($data->relation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phi_number')); ?>:</b>
	<?php echo CHtml::encode($data->phi_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shi_provider')); ?>:</b>
	<?php echo CHtml::encode($data->shi_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shi_number')); ?>:</b>
	<?php echo CHtml::encode($data->shi_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_address')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_2')); ?>:</b>
	<?php echo CHtml::encode($data->address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postal_code')); ?>:</b>
	<?php echo CHtml::encode($data->postal_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_address_1')); ?>:</b>
	<?php echo CHtml::encode($data->billing_address_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_address_2')); ?>:</b>
	<?php echo CHtml::encode($data->billing_address_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_city')); ?>:</b>
	<?php echo CHtml::encode($data->billing_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_province')); ?>:</b>
	<?php echo CHtml::encode($data->billing_province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_postal_code')); ?>:</b>
	<?php echo CHtml::encode($data->billing_postal_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferred_time')); ?>:</b>
	<?php echo CHtml::encode($data->preferred_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('packagining')); ?>:</b>
	<?php echo CHtml::encode($data->packagining); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_instruction')); ?>:</b>
	<?php echo CHtml::encode($data->special_instruction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	*/ ?>

</div>