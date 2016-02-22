<?php
/* @var $this OrderImagesController */
/* @var $model OrderImages */

$this->breadcrumbs=array(
	'Order Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderImages', 'url'=>array('index')),
	array('label'=>'Manage OrderImages', 'url'=>array('admin')),
);
?>

<h1>Create OrderImages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>