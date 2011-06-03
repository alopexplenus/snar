<?php
$this->breadcrumbs=array(
	'Groups',
);
if (Yii::app()->user->name=='admin'){
$this->menu=array(
	array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'Manage Group', 'url'=>array('admin')),
);
}
?>

<h1>Группы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
