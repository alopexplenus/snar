<?php foreach($users as $userReference): ?>
<div class="user" id="u<?php echo $userReference->id; ?>">
	<div class="content">
		<?php  echo $userReference->user->profile->firstname ?>
		<?php  echo $userReference->user->profile->lastname ?>
		(<?php  echo $userReference->user->username ?>)
		<a href="mailto:
		<?php echo CHtml::encode($userReference->user->email); ?>
		">
		<?php echo CHtml::encode($userReference->user->email); ?>
		</a>
		<br> несет:
		<?php  echo $userReference->user->carrySnarCount;?> единиц
		<br> общий вес:
		<?php  echo $userReference->user->snarWeight;?>г 
	</div>

</div><!-- user -->
<?php endforeach; ?>
