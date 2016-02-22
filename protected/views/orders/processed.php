<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
    'Orders'=>array('index'),
    'Manage',
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

<h1>Processed Orders</h1>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php //$this->renderPartial('_search',array(
    //'model'=>$model,
    //)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'orders-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'order_id',
        'mobile_order',
        array(
                'value'=>array($this, 'gridUserName'),
                'name'=>'userName',
                ),
        array(
                'value'=>'$data->user->first_name . " " . $data->user->last_name',//This is the concatenated column
                'name'=>'fullName',
                ),
//        'order_type',
        array(
            'name'=>'date_received',
            'header'=>'Recieved Date ',
            'value'=>'Yii::app()->dateFormatter->format("d MMM y",strtotime($data->date_received))',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
        array(
            'name'=>'time_received',
            'value'=>'$data->time_received',
            'htmlOptions'=>array('style' => 'text-align: right;')
        ),
//        'time_received',
        array(
            'name'=>'admin_id',
            'value'=>function($data)
            {
                echo $data->admin->user_name;
            }
        ),
        array(
            'name'=>'processed_on', 'value'=>'$data->getCreatedDate()',
            'htmlOptions'=>array('style' => 'text-align: right;')
            ),
        /*'admin_id',
        'status',
        'updated_on',
        'created_on',
        */
//        array(
//            'class'=>'CButtonColumn',
//        ),
    ),
)); ?>
