<table id='groupsnar' class="detail-view">
<tr>
	<td>
		#
	</td>
	<td>
		снаряга
	</td>
	<td>
		вес
	</td>
	<td>
		владелец
	</td>
	<td>
		кто несет
	</td>
</tr>
<?php 

$class_array=array('odd','even');
$i = 1;
$j=0;

foreach($snars as $snarref):
//if ($snar->status!=Snar::STATUS_GROUP) continue; // это убирает из списка негрупповую снарягу
$i=abs($i-1);
$j++;
?>
<tr class="<?php echo $class_array[$i];?>" id="u<?php echo $snarref->id; ?>">
<td>
<?=$j?>
</td>
<td>
	<?php  echo CHtml::encode($snarref->snar->title); ?>
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->weight); ?>гр.
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->owner->profile->firstname.' '.$snarref->snar->owner->profile->lastname); ?>
</td>
<td>
	<?php  echo CHtml::link($snarref->carrier->profile->firstname.' '.$snarref->carrier->profile->lastname, $snarref->getUrl(), array(
		'class'=>'cid',
		'title'=>'Изменить несущего',
	)); ?>
</td>
</tr><!-- snar -->
<?php endforeach; ?>
</table>
