<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relation'); ?>
		<?php echo $form->textField($model,'relation',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'relation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phi_number'); ?>
		<?php echo $form->textField($model,'phi_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phi_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shi_provider'); ?>
		<?php echo $form->textField($model,'shi_provider',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'shi_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shi_number'); ?>
		<?php echo $form->textField($model,'shi_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'shi_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_address'); ?>
		<?php echo $form->textField($model,'delivery_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'delivery_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_2'); ?>
		<?php echo $form->textField($model,'address_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postal_code'); ?>
		<?php echo $form->textField($model,'postal_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'postal_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_address_1'); ?>
		<?php echo $form->textField($model,'billing_address_1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'billing_address_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_address_2'); ?>
		<?php echo $form->textField($model,'billing_address_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'billing_address_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_city'); ?>
		<?php echo $form->textField($model,'billing_city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'billing_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_province'); ?>
		<?php echo $form->textField($model,'billing_province',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'billing_province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_postal_code'); ?>
		<?php echo $form->textField($model,'billing_postal_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'billing_postal_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferred_time'); ?>
		<?php echo $form->textField($model,'preferred_time',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'preferred_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'packagining'); ?>
		<?php echo $form->textField($model,'packagining',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'packagining'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'special_instruction'); ?>
		<?php echo $form->textArea($model,'special_instruction',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'special_instruction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on'); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->