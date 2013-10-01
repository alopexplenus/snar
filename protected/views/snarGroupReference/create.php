<?php
$this->breadcrumbs=array(
	'Snar Group References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SnarGroupReference', 'url'=>array('index')),
	array('label'=>'Manage SnarGroupReference', 'url'=>array('admin')),
);
?>

<h1>Create SnarGroupReference</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>