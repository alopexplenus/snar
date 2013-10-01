<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'snarGrid',
    'dataProvider' => $snarProvider,
    'columns' => array(
        'id',
        'snar.weight',
        'carrier_name',
    ),
));
*/
?>


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
<!--	<th class='asc'>
		UserGroupReference
	</th> -->
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
	<?php  echo CHtml::encode(mb_convert_case( $snarref->snar->title, MB_CASE_LOWER, "UTF-8")); ?>
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->weight); ?>гр.
</td>
<td>
		<?php echo CHtml::encode($snarref->snar->owner->profile->firstname.' '.$snarref->snar->owner->profile->lastname);
		// Тут столбец с технической инфой, открыть для дебагaaа
		/*
		?>
		
</td>
<td>
	<?php  
	echo CHtml::encode($snarref->id); 
	echo "&nbsp;";
	echo CHtml::encode($snarref->carrier->id); 
	*/
	?>
</td>
<td>
	<?php
	echo CHtml::encode($snarref->carrier->user->profile->firstname.' '.$snarref->carrier->user->profile->lastname);

	?>
</td>
<td>
	<?php  
	echo CHtml::ajaxLink(
	//'изменить',
	"...",
	$snarref->getUrl(),
	array(
		'type' => 'POST',// method
		'url' => $snarref->getUrl(),
		'data'=>array('update'=>TRUE),// DATA
		'success'=>'function(r){$("#update").html(r).dialog("open"); return false;}', 

	));
	?>
</td>
</tr><!-- snar -->
<?php endforeach; ?>
</table>
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
			'id'=>'update',
			'options'=>array(
				'title'=>'Update People',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>'auto',
				'height'=>'auto',
				'resizable'=>'true',
			),
		));
	$this->endWidget();


?>
