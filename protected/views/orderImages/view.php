<?php
/* @var $this OrderImagesController */
/* @var $model OrderImages */

$this->breadcrumbs=array(
	'Order Images'=>array('index'),
	$model->order_image_id,
);

$this->menu=array(
	array('label'=>'List OrderImages', 'url'=>array('index')),
	array('label'=>'Create OrderImages', 'url'=>array('create')),
	array('label'=>'Update OrderImages', 'url'=>array('update', 'id'=>$model->order_image_id)),
	array('label'=>'Delete OrderImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->order_image_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderImages', 'url'=>array('admin')),
);
?>

<h1>View OrderImages #<?php echo $model->order_image_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_image_id',
		'order_id',
		'image_name',
		'created_on',
	),
)); ?>
