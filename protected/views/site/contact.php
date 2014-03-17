<?php
/* @var $this SiteController */
/* @var $studentCca ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($studentCca); ?>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'name'); ?>
		<?php echo $form->textField($studentCca,'name'); ?>
		<?php echo $form->error($studentCca,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'email'); ?>
		<?php echo $form->textField($studentCca,'email'); ?>
		<?php echo $form->error($studentCca,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'subject'); ?>
		<?php echo $form->textField($studentCca,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($studentCca,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($studentCca,'body'); ?>
		<?php echo $form->textArea($studentCca,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($studentCca,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($studentCca,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($studentCca,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($studentCca,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>