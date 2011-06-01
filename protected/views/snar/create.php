<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Snar', 'url'=>array('index')),
	array('label'=>'Manage Snar', 'url'=>array('admin')),
);
?>

<h1>Create Snar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>