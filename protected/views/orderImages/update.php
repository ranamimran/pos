<?php
/* @var $this OrderImagesController */
/* @var $model OrderImages */

$this->breadcrumbs=array(
	'Order Images'=>array('index'),
	$model->order_image_id=>array('view','id'=>$model->order_image_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderImages', 'url'=>array('index')),
	array('label'=>'Create OrderImages', 'url'=>array('create')),
	array('label'=>'View OrderImages', 'url'=>array('view', 'id'=>$model->order_image_id)),
	array('label'=>'Manage OrderImages', 'url'=>array('admin')),
);
?>

<h1>Update OrderImages <?php echo $model->order_image_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>