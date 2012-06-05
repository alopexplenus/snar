<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group->groupname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('snar_id')); ?>:</b>
	<?php echo CHtml::encode($data->snar->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrier_id')); ?>:</b>
	<?php echo CHtml::encode($data->carrier->user->username); ?>
	<br />

</div>
