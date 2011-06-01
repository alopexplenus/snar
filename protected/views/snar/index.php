<?php
$this->breadcrumbs=array(
	'Snars',
);

$this->menu=array(
	array('label'=>'Create Snar', 'url'=>array('create')),
	array('label'=>'Manage Snar', 'url'=>array('admin')),
);
?>

<h1>Моё снаряжение</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
