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

<h1>Группа <?php echo $model->groupname; 


?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'groupname',
		'maillist',
		'weight_factor',
	),
)); ?>

<div id="people">
    <?php if($model->userCount>=1): ?>
        <h3>
           Участники:  <?php echo $model->userCount; ?>, 
           из них <?php echo $model->maleCount; ?> м., <?php echo $model->userCount-$model->maleCount ?> ж.
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
        Снаряжение:  <?php  echo $model->snarCount.' ед.  Общий вес '.$model->snarWeight.'г.'?>
		<br/>
		Средний вес на человека: <?php echo $model->average_weight(); ?> г.
		<br/>
		Средний вес м: <?php echo $model->male_weight();?> г.
		<br/>
		Средний вес ж: <?php echo $model->female_weight(); ?> г.

        </h3>
        <?php $this->renderPartial('_snar',array(
            'group'=>$model,
            'snars'=>$model->snarGroupReferences,
        )); ?>
    <?php endif; ?>
</div>
