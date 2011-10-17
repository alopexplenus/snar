<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-group-reference-form',
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
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'user_role'); ?>
		<?php echo $form->textField($model,'user_role',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'palatka'); ?>
		<?php echo $form->textField($model,'palatka'); ?>
		<?php echo $form->error($model,'palatka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'svyazka'); ?>
		<?php echo $form->textField($model,'svyazka'); ?>
		<?php echo $form->error($model,'svyazka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
