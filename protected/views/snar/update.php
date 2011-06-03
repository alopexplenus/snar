<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Всё снаряжение', 'url'=>array('index')),
	array('label'=>'Моё снаряжение', 'url'=>array('my')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Снаряжение <?php echo ' ('.$model->title.')' ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
