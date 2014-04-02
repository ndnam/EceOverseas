<?php
/* @var $this UserController */
/* @var $medicalInfo MedicalInfo */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
    'Profile',
);
?>

<h2><center>Medical History</center></h2>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medical-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'heartProblem'); ?>
		<?php echo $form->checkBox($medicalInfo,'heartProblem'); ?>
		<?php echo $form->error($medicalInfo,'heartProblem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'fits'); ?>
		<?php echo $form->checkBox($medicalInfo,'fits'); ?>
		<?php echo $form->error($medicalInfo,'fits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'faintingSpell'); ?>
		<?php echo $form->checkBox($medicalInfo,'faintingSpell'); ?>
		<?php echo $form->error($medicalInfo,'faintingSpell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'diabetes'); ?>
		<?php echo $form->checkBox($medicalInfo,'diabetes'); ?>
		<?php echo $form->error($medicalInfo,'diabetes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'asthma'); ?>
		<?php echo $form->checkBox($medicalInfo,'asthma'); ?>
		<?php echo $form->error($medicalInfo,'asthma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'migraine'); ?>
		<?php echo $form->checkBox($medicalInfo,'migraine'); ?>
		<?php echo $form->error($medicalInfo,'migraine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'visionProblem'); ?>
		<?php echo $form->checkBox($medicalInfo,'visionProblem'); ?>
		<?php echo $form->error($medicalInfo,'visionProblem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'colorBlind'); ?>
		<?php echo $form->checkBox($medicalInfo,'colorBlind'); ?>
		<?php echo $form->error($medicalInfo,'colorBlind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'earProblem'); ?>
		<?php echo $form->checkBox($medicalInfo,'earProblem'); ?>
		<?php echo $form->error($medicalInfo,'earProblem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'fractures'); ?>
		<?php echo $form->checkBox($medicalInfo,'fractures'); ?>
		<?php echo $form->error($medicalInfo,'fractures'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'dislocations'); ?>
		<?php echo $form->checkBox($medicalInfo,'dislocations'); ?>
		<?php echo $form->error($medicalInfo,'dislocations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'carrierStatus'); ?>
		<?php echo $form->checkBox($medicalInfo,'carrierStatus'); ?>
		<?php echo $form->error($medicalInfo,'carrierStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'otherMedicalHistory'); ?>
		<?php echo $form->textArea($medicalInfo,'otherMedicalHistory'); ?>
		<?php echo $form->error($medicalInfo,'otherMedicalHistory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'currentMedications'); ?>
		<?php echo $form->textArea($medicalInfo,'currentMedications'); ?>
		<?php echo $form->error($medicalInfo,'currentMedications'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'otherMedicalConditions'); ?>
		<?php echo $form->textArea($medicalInfo,'otherMedicalConditions'); ?>
		<?php echo $form->error($medicalInfo,'otherMedicalConditions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'physicalDisabilities'); ?>
		<?php echo $form->textArea($medicalInfo,'physicalDisabilities'); ?>
		<?php echo $form->error($medicalInfo,'physicalDisabilities'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'allergies'); ?>
		<?php echo $form->textArea($medicalInfo,'allergies'); ?>
		<?php echo $form->error($medicalInfo,'allergies'); ?>
	</div>

        <div class="row">
            <label style="width:320px">Dietary Requirements / Food restrictions:</label>
        </div>
        
	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'vegetarian'); ?>
		<?php echo $form->checkBox($medicalInfo,'vegetarian'); ?>
		<?php echo $form->error($medicalInfo,'vegetarian'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'halal'); ?>
		<?php echo $form->checkBox($medicalInfo,'halal'); ?>
		<?php echo $form->error($medicalInfo,'halal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'noSeafood'); ?>
		<?php echo $form->checkBox($medicalInfo,'noSeafood'); ?>
		<?php echo $form->error($medicalInfo,'noSeafood'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'noBeef'); ?>
		<?php echo $form->checkBox($medicalInfo,'noBeef'); ?>
		<?php echo $form->error($medicalInfo,'noBeef'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($medicalInfo,'otherFoodRestrictions'); ?>
		<?php echo $form->textArea($medicalInfo,'otherFoodRestrictions'); ?>
		<?php echo $form->error($medicalInfo,'otherFoodRestrictions'); ?>
	</div>

        <div class="row buttons">
            <input type="submit" value="Save" name="btnSave" style="margin-left: 230px;">
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->