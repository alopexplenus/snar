<!--<table id='groupsnar' class="detail-view"> -->
<table cellpadding="0" cellspacing="0" border="0" class="sortable" id="sorter">
<tr>
	<th class='head'>
		снаряга
	</th>
	<th class='head'>
		вес
	</th>
	<th class='head'>
		владелец
	</th>
	<th class='asc'>
		кто_несет
	</th>
	<th class='nosort'>
		&nbsp;
	</th>
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
	<?php  echo CHtml::encode($snarref->snar->title); ?>
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->weight); ?>гр.
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->owner->profile->firstname.' '.$snarref->snar->owner->profile->lastname); ?>
</td>
<td>
	<?php  
	//echo CHtml::link($snarref->carrier->profile->firstname.' '.$snarref->carrier->profile->lastname, $snarref->getUrl(), array( 'class'=>'cid', 'title'=>'Изменить несущего',)); 
	echo CHtml::encode($snarref->carrier->profile->firstname.' '.$snarref->carrier->profile->lastname); 
	?>
</td>
<td>
	<?php  
	echo CHtml::link('изм.', $snarref->getUrl(), array( 'class'=>'cid', 'title'=>'Изменить несущего',)); 
	?>
</td>
</tr><!-- snar -->
<?php endforeach; ?>
</table>
