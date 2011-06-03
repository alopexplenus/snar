<?php
$this->breadcrumbs=array(
	'Snar Group References'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SnarGroupReference', 'url'=>array('index')),
	array('label'=>'Create SnarGroupReference', 'url'=>array('create')),
	array('label'=>'View SnarGroupReference', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SnarGroupReference', 'url'=>array('admin')),
);
?>

<h1>Update SnarGroupReference <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>