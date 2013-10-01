<h1>Раздача слонов!</h1>
<p>слоны будут разыграны автоматически, случайно и тайно. Каждому участнику будет отправлено письмо с именем другого участника</p>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slon-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'slon_message_subject'); ?>
		<?php echo $form->textField($model,'slon_message_subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'slon_message_subject'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'slon_message'); ?>
		<?php echo $form->textArea($model,'slon_message'); ?>
		<?php echo $form->error($model,'slon_message'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить слоновьи записки!'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
