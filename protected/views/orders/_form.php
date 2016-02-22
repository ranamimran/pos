<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_order'); ?>
		<?php echo $form->textField($model,'mobile_order',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mobile_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_type'); ?>
		<?php echo $form->textField($model,'order_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'order_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_received'); ?>
		<?php echo $form->textField($model,'date_received',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'date_received'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_received'); ?>
		<?php echo $form->textField($model,'time_received',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'time_received'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'processed_on'); ?>
		<?php echo $form->textField($model,'processed_on',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'processed_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_id'); ?>
		<?php echo $form->textField($model,'admin_id'); ?>
		<?php echo $form->error($model,'admin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->