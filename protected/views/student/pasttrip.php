<?php
/* @var $this PastTripController */
/* @var $studentCca PastTrip */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'past-trip-pasttrip-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($studentCca); ?>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'studentId'); ?>
		<?php echo $form->textField($studentCca,'studentId'); ?>
		<?php echo $form->error($studentCca,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'programName'); ?>
		<?php echo $form->textField($studentCca,'programName'); ?>
		<?php echo $form->error($studentCca,'programName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'country'); ?>
		<?php echo $form->textField($studentCca,'country'); ?>
		<?php echo $form->error($studentCca,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'duration'); ?>
		<?php echo $form->textField($studentCca,'duration'); ?>
		<?php echo $form->error($studentCca,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'capacity'); ?>
		<?php echo $form->textField($studentCca,'capacity'); ?>
		<?php echo $form->error($studentCca,'capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'created'); ?>
		<?php echo $form->textField($studentCca,'created'); ?>
		<?php echo $form->error($studentCca,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'modified'); ?>
		<?php echo $form->textField($studentCca,'modified'); ?>
		<?php echo $form->error($studentCca,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'isSubsidized'); ?>
		<?php echo $form->textField($studentCca,'isSubsidized'); ?>
		<?php echo $form->error($studentCca,'isSubsidized'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'amount'); ?>
		<?php echo $form->textField($studentCca,'amount'); ?>
		<?php echo $form->error($studentCca,'amount'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->