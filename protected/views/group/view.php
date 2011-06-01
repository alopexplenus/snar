<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Group', 'url'=>array('index')),
	array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'Update Group', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Group', 'url'=>array('admin')),
);
?>

<h1>View Group #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'groupname',
		'maillist',
		'admin_id',
	),
)); ?>

<div id="people">
    <?php if($model->userCount>=1): ?>
        <h3>
            <?php echo $model->userCount . 'comment(s)'; ?>
        </h3>
 
        <?php $this->renderPartial('_users',array(
            'group'=>$model,
            'users'=>$model->users,
        )); ?>
    <?php endif; ?>
</div>
