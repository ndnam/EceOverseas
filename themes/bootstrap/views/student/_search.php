<?php
/* @var $this StudentController */
/* @var $studentCca Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($studentCca,'id'); ?>
		<?php echo $form->textField($studentCca,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'fullName'); ?>
		<?php echo $form->textField($studentCca,'fullName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'familyName'); ?>
		<?php echo $form->textField($studentCca,'familyName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'gender'); ?>
		<?php echo $form->textField($studentCca,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'studentNumber'); ?>
		<?php echo $form->textField($studentCca,'studentNumber',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'school'); ?>
		<?php echo $form->textField($studentCca,'school',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'course'); ?>
		<?php echo $form->textField($studentCca,'course',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'level'); ?>
		<?php echo $form->textField($studentCca,'level',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'birthday'); ?>
		<?php echo $form->textField($studentCca,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'race'); ?>
		<?php echo $form->textField($studentCca,'race',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'religion'); ?>
		<?php echo $form->textField($studentCca,'religion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'nationality'); ?>
		<?php echo $form->textField($studentCca,'nationality',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'isPR'); ?>
		<?php echo $form->textField($studentCca,'isPR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'nricNumber'); ?>
		<?php echo $form->textField($studentCca,'nricNumber',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'passportNumber'); ?>
		<?php echo $form->textField($studentCca,'passportNumber',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'issuingCountry'); ?>
		<?php echo $form->textField($studentCca,'issuingCountry',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'issuingDate'); ?>
		<?php echo $form->textField($studentCca,'issuingDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'expiryDate'); ?>
		<?php echo $form->textField($studentCca,'expiryDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'tshirtSize'); ?>
		<?php echo $form->textField($studentCca,'tshirtSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'bloodGroup'); ?>
		<?php echo $form->textField($studentCca,'bloodGroup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'swimmingAbility'); ?>
		<?php echo $form->textField($studentCca,'swimmingAbility'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'homeAddress'); ?>
		<?php echo $form->textField($studentCca,'homeAddress',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'postalCode'); ?>
		<?php echo $form->textField($studentCca,'postalCode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'housingType'); ?>
		<?php echo $form->textField($studentCca,'housingType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'personalEmail'); ?>
		<?php echo $form->textField($studentCca,'personalEmail',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'mobilePhone'); ?>
		<?php echo $form->textField($studentCca,'mobilePhone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'homePhone'); ?>
		<?php echo $form->textField($studentCca,'homePhone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'created'); ?>
		<?php echo $form->textField($studentCca,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($studentCca,'modified'); ?>
		<?php echo $form->textField($studentCca,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->