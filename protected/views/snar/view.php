<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Snar', 'url'=>array('index')),
	array('label'=>'Create Snar', 'url'=>array('create')),
	array('label'=>'Update Snar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Snar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Snar', 'url'=>array('admin')),
);
?>

<h1>View Snar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'weight',
		'status',
		'owner_id',
	),
)); ?>
