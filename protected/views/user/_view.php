<div class="view">



	<b><?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile')); ?>:</b>
	<?php echo CHtml::encode($data->profile); ?>
	<br />


</div>
