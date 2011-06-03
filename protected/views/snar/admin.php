<?php
$this->breadcrumbs=array(
	'Snars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Всё снаряжение', 'url'=>array('index')),
	array('label'=>'Moё снаряжение', 'url'=>array('my')),
	array('label'=>'Создать ', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('snar-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление снаряжением</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'snar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'weight',
		'status',
		'owner_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
