<?php
/* @var $this StaffController */
/* @var $staff Staff */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-create-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($user,$staff)); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username'); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password'); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($staff,'initial'); ?>
		<?php echo $form->textField($staff,'initial'); ?>
		<?php echo $form->error($staff,'initial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($staff,'fullName'); ?>
		<?php echo $form->textField($staff,'fullName'); ?>
		<?php echo $form->error($staff,'fullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($staff,'email'); ?>
		<?php echo $form->textField($staff,'email'); ?>
		<?php echo $form->error($staff,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($staff,'phone'); ?>
		<?php echo $form->textField($staff,'phone'); ?>
		<?php echo $form->error($staff,'phone'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->