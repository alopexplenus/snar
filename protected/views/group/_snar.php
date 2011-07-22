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

foreach($snars as $snar):
//if ($snar->status!=Snar::STATUS_GROUP) continue; // это убирает из списка негрупповую снарягу
$i=abs($i-1);
$j++;
?>
<tr class="<?php echo $class_array[$i];?>" id="u<?php echo $snar->id; ?>">
<td>
<?=$j?>
</td>
<td>
	<?php  echo CHtml::link($snar->title, $snar->getUrl(), array(
		'class'=>'cid',
		'title'=>'Permalink to this snar',
	)); ?>
</td>
<td>
		<?php echo CHtml::encode($snar->weight); ?>гр.
</td>
<td>
		<?php echo CHtml::encode($snar->owner->username); ?>
</td>
<td>
		<?php  
		// echo CHtml::encode($snar->carrier_id); 
		?>
</td>
</tr><!-- snar -->
<?php endforeach; ?>
</table>
