<?php
$this->breadcrumbs=array(
	'Snars',
);

$this->menu=array(
	array('label'=>'Всё снаряжение', 'url'=>array('index')),
	array('label'=>'Moё снаряжение', 'url'=>array('my')),
	array('label'=>'Создать ', 'url'=>array('create')),
	//array('label'=>'Управлять', 'url'=>array('admin')),
);
?>

<h1>снаряжение</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
