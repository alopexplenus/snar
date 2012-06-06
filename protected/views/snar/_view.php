<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	Владелец: 
	<?php echo CHtml::encode($data->owner->username); ?> <br />

	<?php 
	/*
	$arr = Lookup::items('SnarStatus');
	echo CHtml::encode($arr[$data->status]); 
	*/
	?>
	<br />


</div>
