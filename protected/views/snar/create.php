<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Всё снаряжение', 'url'=>array('index')),
	array('label'=>'Моё снаряжение', 'url'=>array('my')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>добавляем снаряжение</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
