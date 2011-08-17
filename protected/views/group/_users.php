<table cellpadding="0" cellspacing="0" border="0" class="sortable" id="sorter2">

<?php foreach($users as $userReference): ?>
<tr>
		<td>
		<?php  echo $userReference->user->profile->firstname ?>
		<?php  echo $userReference->user->profile->lastname ?>
		(<?php  echo $userReference->user->username ?>)
		</td>
		<td>
		<a href="mailto:
		<?php echo CHtml::encode($userReference->user->email); ?>
		">
		<?php echo CHtml::encode($userReference->user->email); ?>
		</a>
		</td>
		<td>
		<?php  echo $userReference->user->carrySnarCount;?> единиц
		</td>
		<td>
		<?php  echo $userReference->user->snarWeight;?>г 
		</td>
</tr>

<?php endforeach; ?>

</table>
