<?php
$this->breadcrumbs=array(
	'User Group References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserGroupReference', 'url'=>array('index')),
	array('label'=>'Manage UserGroupReference', 'url'=>array('admin')),
);
?>

<h1>Create UserGroupReference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>