<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id,
);
if (Yii::app()->user->name=='admin'){
	$this->menu=array(
		array('label'=>'List Group', 'url'=>array('index')),
		array('label'=>'Create Group', 'url'=>array('create')),
		array('label'=>'Update Group', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Group', 'url'=>array('admin')),
	);
}
?>

<h1>Группа <?php echo $model->groupname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'groupname',
		'maillist',
	),
)); ?>

<div id="people">
    <?php if($model->userCount>=1): ?>
        <h3>
           Участники:  <?php echo $model->userCount; ?>
        </h3>
        <?php $this->renderPartial('_users',array(
            'group'=>$model,
            'users'=>$model->userGroupReferences,
        )); ?>
    <?php endif; ?>
</div>

<div id="snar">
    <?php if($model->snarCount>=0): ?>
        <h3>
           Снаряжение:  <?php // echo $model->snarCount; ?>
        </h3>
        <?php $this->renderPartial('_snar',array(
            'group'=>$model,
            'snars'=>$model->snarGroupReferences,
        )); ?>
    <?php endif; ?>
</div>
