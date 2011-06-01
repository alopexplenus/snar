<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->groupname), array('view', 'id'=>$data->id)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('maillist')); ?>:</b>
	<?php echo CHtml::encode($data->maillist); ?>
	<br />

</div>
