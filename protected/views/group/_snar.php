<table id='groupsnar' class="detail-view">
<?php foreach($snars as $snarReference):
if ($snarReference->snar->status!=Snar::STATUS_GROUP) continue;

?>
<tr class="odd" id="u<?php echo $snarReference->id; ?>">
<td>
	<?php  echo CHtml::link($snarReference->snar->title, $snarReference->snar->getUrl(), array(
		'class'=>'cid',
		'title'=>'Permalink to this snar',
	)); ?>
</td>
<td>
		<?php echo CHtml::encode($snarReference->snar->weight); ?>гр.
</td>
<td>
		<?php echo CHtml::encode($snarReference->snar->owner->username); ?>
</td>
</tr><!-- snar -->
<?php endforeach; ?>
</table>
