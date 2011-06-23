<table id='groupsnar' class="detail-view">
<?php foreach($snars as $snar):
if ($snar->status!=Snar::STATUS_GROUP) continue;

?>
<tr class="odd" id="u<?php echo $snar->id; ?>">
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
</tr><!-- snar -->
<?php endforeach; ?>
</table>
