<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Участник <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'gender',
		'username',
		'password',
		'salt',
		'email',
		'profile',
	),
)); ?>

<div id="snar">
    <?php if($model->snarCount>=1): ?>
        <h3>
           Артефакты:  <?php echo $model->snarCount; ?> 
        </h3>
 
        <?php $this->renderPartial('_snars',array(
            'group'=>$model,
            'snars'=>$model->snars,
        )); ?>
    <?php endif; ?>
</div>
