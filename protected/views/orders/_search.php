<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobile_order'); ?>
		<?php echo $form->textField($model,'mobile_order',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_type'); ?>
		<?php echo $form->textField($model,'order_type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_received'); ?>
		<?php echo $form->textField($model,'date_received',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_received'); ?>
		<?php echo $form->textField($model,'time_received',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
	</div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->label($model,'processed_on'); ?>
<!--		--><?php //echo $form->textField($model,'processed_on',array('size'=>50,'maxlength'=>50)); ?>
<!--	</div>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->label($model,'admin_id'); ?>
<!--		--><?php //echo $form->textField($model,'admin_id'); ?>
<!--	</div>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->label($model,'updated_on'); ?>
<!--		--><?php //echo $form->textField($model,'updated_on'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->label($model,'created_on'); ?>
<!--		--><?php //echo $form->textField($model,'created_on',array('size'=>50,'maxlength'=>50)); ?>
<!--	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->