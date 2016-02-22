<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'first_name',
		'last_name',
		'email',
		'password',
		'date_of_birth',
		'relation',
		'phi_number',
		'shi_provider',
		'shi_number',
		'delivery_address',
		'address_2',
		'city',
		'province',
		'postal_code',
		'billing_address_1',
		'billing_address_2',
		'billing_city',
		'billing_province',
		'billing_postal_code',
		'preferred_time',
		'packagining',
		'special_instruction',
		'parent_id',
		'updated_on',
		'created_on',
	),
)); ?>
