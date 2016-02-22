<?php
/* @var $this OrderImagesController */
/* @var $data OrderImages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_image_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_image_id), array('view', 'id'=>$data->order_image_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_name')); ?>:</b>
	<?php echo CHtml::encode($data->image_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />


</div>