<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'snar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_id'); ?>
		<?php echo $form->dropDownList($model,'owner_id', User::model()->loadItems()); ?>
		<?php echo $form->error($model,'owner_id'); ?>
	</div>
	<?php /*
	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', Lookup::items('SnarStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	*/
	
	
	
	?>
	<div class="row ">
	<br><br>
	<h4>Взять в поход:</h4>
	<?php 
		$user=User::model()->findByPk(Yii::app()->user->id);
		foreach($user->groups as $group){ 
			echo CHtml::checkBox('group'.$group->id);
			echo $group->groupname."<br>";
		} 
	?>
	</div >

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
