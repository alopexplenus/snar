<?php
$this->breadcrumbs=array(
	'Snar Group References',
);

$this->menu=array(
	array('label'=>'Create SnarGroupReference', 'url'=>array('create')),
	array('label'=>'Manage SnarGroupReference', 'url'=>array('admin')),
);
?>

<h1>Snar Group References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
