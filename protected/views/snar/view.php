<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Всё снаряжение', 'url'=>array('index')),
	array('label'=>'Moё снаряжение', 'url'=>array('my')),
	array('label'=>'Создать ', 'url'=>array('create')),
	array('label'=>'Править текущее', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управлять', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'description',
		'weight',
		'owner_id',
	),
)); ?>
