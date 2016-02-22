<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Search',
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	array('label'=>'Create Orders', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search Orders</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">

<?php $this->renderPartial('_search',array(

        'model'=>$model,

)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
		'mobile_order',
		array(
			'name'=>'first_name',
			'value'=>function($data)
			{
				echo $data->user->first_name;
			}
		),
		//'user.first_name',
		array(
			'name'=>'last_name',
			'value'=>function($data)
			{
				echo $data->user->last_name;
			}
		),
		'order_type',
		'date_received',
		'time_received',
		'status',
//		'processed_on',
		/*
		'status',
		'processed_on',
		'admin_id',
		'updated_on',
		'created_on',
		*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
		),
	),
)); ?>
