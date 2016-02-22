<?php
/* @var $this OrdersController */
/* @var $data Orders */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_id), array('view', 'id'=>$data->order_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_order')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_type')); ?>:</b>
	<?php echo CHtml::encode($data->order_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_received')); ?>:</b>
	<?php echo CHtml::encode($data->date_received); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_received')); ?>:</b>
	<?php echo CHtml::encode($data->time_received); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>