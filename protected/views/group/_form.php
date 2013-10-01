<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'groupname'); ?>
		<?php echo $form->textField($model,'groupname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'groupname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maillist'); ?>
		<?php echo $form->textField($model,'maillist',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'maillist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_id'); ?>
		<?php echo $form->textField($model,'admin_id'); ?>
		<?php echo $form->error($model,'admin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight_factor'); ?>
		<?php echo $form->textField($model,'weight_factor'); ?>
		<?php echo $form->error($model,'weight_factor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
