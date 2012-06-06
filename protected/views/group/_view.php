<div class="view">

	<h4><?php echo CHtml::link(CHtml::encode($data->groupname), array('view', 'id'=>$data->id)); ?></h4>

<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('maillist')); ?>:</b>
	<?php echo CHtml::encode($data->maillist); ?>
	<br />
*/  


if ($data->amIMember()) {
	echo "Вы член группы";
}
else  { 
	echo CHtml::link('Вступить в группу',array('join','id'=>$data->id)); 
} 
?>


</div>
