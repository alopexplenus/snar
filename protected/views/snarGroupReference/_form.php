<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'snar-group-reference-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $model->group->groupname ?>
	</div>

	<div class="row">
		<?php echo $model->snar->title; ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'carrier_id'); ?>
		<?php echo $form->dropDownList($model,'carrier_id', UserGroupReference::model()->loadUserNames()); ?>
		<?php echo $form->error($model,'carrier_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'создать' : 'сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
