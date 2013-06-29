<?php $this->pageTitle=Yii::app()->name; ?>
<h1><?php echo 'Вас приветствует '.CHtml::encode(Yii::app()->name); ?></h1>
		<?php echo CHtml::link(Yii::app()->getModule('user')->t("Login"),Yii::app()->getModule('user')->loginUrl); ?> 
|
		<?php echo CHtml::link(Yii::app()->getModule('user')->t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> 

