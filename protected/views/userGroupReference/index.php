<?php
$this->breadcrumbs=array(
	'User Group References',
);

$this->menu=array(
	array('label'=>'Create UserGroupReference', 'url'=>array('create')),
	array('label'=>'Manage UserGroupReference', 'url'=>array('admin')),
);
?>

<h1>User Group References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
