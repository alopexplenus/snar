<?php foreach($snars as $snar): ?>
<div class="snar" id="u<?php echo $snarReference->id; ?>">

	<?php  echo CHtml::link($snar->title, $snar->getUrl(), array(
		'class'=>'cid',
		'title'=>'Permalink to this snar',
	)); ?>


</div><!-- snar -->
<?php endforeach; ?>
