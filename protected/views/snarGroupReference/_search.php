<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'snar_id'); ?>
		<?php echo $form->textField($model,'snar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'snar_status'); ?>
		<?php echo $form->textField($model,'snar_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrier_id'); ?>
		<?php echo $form->textField($model,'carrier_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->