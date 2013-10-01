<?php
$this->breadcrumbs=array(
	'Snar Group References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SnarGroupReference', 'url'=>array('index')),
	array('label'=>'Create SnarGroupReference', 'url'=>array('create')),
	array('label'=>'Update SnarGroupReference', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SnarGroupReference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SnarGroupReference', 'url'=>array('admin')),
);
?>

<h1>View SnarGroupReference #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
		'snar_id',
		'snar_status',
		'carrier_id',
	),
)); ?>
