<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Snar', 'url'=>array('index')),
	array('label'=>'Create Snar', 'url'=>array('create')),
	array('label'=>'View Snar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Snar', 'url'=>array('admin')),
);
?>

<h1>Update Snar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>