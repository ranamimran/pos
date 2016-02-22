<?php
/* @var $this OrderImagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Images',
);

$this->menu=array(
	array('label'=>'Create OrderImages', 'url'=>array('create')),
	array('label'=>'Manage OrderImages', 'url'=>array('admin')),
);
?>

<h1>Order Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
