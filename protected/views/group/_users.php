<?php foreach($users as $userReference): ?>
<div class="user" id="u<?php echo $userReference->id; ?>">

	<?php  echo CHtml::link($userReference->user->username, $userReference->user->getUrl(), array(
		'class'=>'cid',
		'title'=>'Permalink to this user',
	)); ?>

	<div class="content">
		<?php echo CHtml::encode($userReference->user->email); ?>
	</div>

</div><!-- user -->
<?php endforeach; ?>
