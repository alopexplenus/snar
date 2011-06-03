<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'snar-group-reference-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'snar_id'); ?>
		<?php echo $form->textField($model,'snar_id'); ?>
		<?php echo $form->error($model,'snar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'snar_status'); ?>
		<?php echo $form->textField($model,'snar_status'); ?>
		<?php echo $form->error($model,'snar_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrier_id'); ?>
		<?php echo $form->textField($model,'carrier_id'); ?>
		<?php echo $form->error($model,'carrier_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->