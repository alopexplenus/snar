<table cellpadding="0" cellspacing="0" border="0" class="sortable" id="sorter2">
<tr>
		<th>
		участник
		</th>
		<th>
		снаряга
		</th>
		<th>
		вес
		</th>
		<th>
		перевес(+) недовес(-)
		</th>
</tr>

<?php foreach($users as $userReference): ?>
<tr>
		<td>
		<?php  echo $userReference->user->profile->firstname ?>
		<?php  echo $userReference->user->profile->lastname ?>
		(<?php  echo $userReference->user->username ?>)
		</td>
		<td>
		<?php  echo $userReference->carrySnarCount;?> единиц
		</td>
		<td>
		<?php  echo $userReference->snarWeight;?>г 
		</td>
		<td>
		<?php  echo $userReference->snarDiff();?>г 
		</td>
</tr>

<?php endforeach; ?>

</table>
