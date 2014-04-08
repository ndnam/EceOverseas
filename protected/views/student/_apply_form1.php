<?php
/* @var $this StudentController */
/* @var $student Student */
/* @var $form CActiveForm */
?>

<h1>Application - step 1 - Student information</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-step1-form',
	'enableAjaxValidation'=>true,
)); ?>

        <?php echo $form->errorSummary($student); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($student,'firstName'); ?>
		<?php echo $form->textField($student,'firstName',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($student,'firstName'); ?>
	</div>
            
        <div class="row">
		<?php echo $form->labelEx($student,'familyName'); ?>
		<?php echo $form->textField($student,'familyName',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'familyName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'gender'); ?>
		<?php echo $form->dropdownList($student,'gender',array(
                    1 => 'Male',
                    2 => 'Female',
                )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'birthday'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Student[birthday]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'1970:2000',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $student->birthday,
                )); ?>
		<?php echo $form->error($student,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'studentNumber'); ?>
		<?php echo $form->textField($student,'studentNumber',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($student,'studentNumber'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'school'); ?>
		<?php echo $form->textField($student,'school',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'school'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'course'); ?>
		<?php echo $form->textField($student,'course',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'course'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'level'); ?>
		<?php echo $form->textField($student,'level',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($student,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'race'); ?>
		<?php echo $form->textField($student,'race',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'race'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'religion'); ?>
		<?php echo $form->textField($student,'religion',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'religion'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'nationality'); ?>
		<?php echo $form->textField($student,'nationality',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'isPR'); ?>
		<?php echo $form->checkbox($student,'isPR'); ?>
		<?php echo $form->error($student,'isPR'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'nricNumber'); ?>
		<?php echo $form->textField($student,'nricNumber',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($student,'nricNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'passportNumber'); ?>
		<?php echo $form->textField($student,'passportNumber',array('size'=>10,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'passportNumber'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'issuingCountry'); ?>
		<?php echo $form->dropdownList($student,'issuingCountry',DictCountry::getCountries()); ?>
		<?php echo $form->error($student,'issuingCountry'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'issuingDate'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Student[issuingDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2000:2014',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $student->issuingDate,
                )); ?>
		<?php echo $form->error($student,'issuingDate'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'expiryDate'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Student[expiryDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2000:2025',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $student->expiryDate,
                )); ?>
		<?php echo $form->error($student,'expiryDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'tshirtSize'); ?>
		<?php echo $form->dropdownList($student,'tshirtSize',Dictionary::items(Dictionary::TYPE_TSHIRT_SIZE)); ?>
		<?php echo $form->error($student,'tshirtSize'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'bloodGroup'); ?>
		<?php echo $form->dropdownList($student,'bloodGroup',Dictionary::items(Dictionary::TYPE_BLOOD_GROUP)); ?>
		<?php echo $form->error($student,'bloodGroup'); ?>
	</div>

	<div class="row">            
		<?php echo $form->labelEx($student,'swimmingAbility'); ?>
		<?php echo $form->dropdownList($student,'swimmingAbility',Dictionary::items(Dictionary::TYPE_SWIMMING_ABILITY)); ?>
		<?php echo $form->error($student,'swimmingAbility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'homeAddress'); ?>
		<?php echo $form->textArea($student,'homeAddress',array('style'=>'width:20em','maxlength'=>200)); ?>
		<?php echo $form->error($student,'homeAddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'postalCode'); ?>
		<?php echo $form->textField($student,'postalCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($student,'postalCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'housingType'); ?>
		<?php echo $form->dropdownList($student,'housingType',Dictionary::items(Dictionary::TYPE_HOUSING)); ?>
		<?php echo $form->error($student,'housingType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'personalEmail'); ?>
		<?php echo $form->textField($student,'personalEmail',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($student,'personalEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'mobilePhone'); ?>
		<?php echo $form->textField($student,'mobilePhone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($student,'mobilePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($student,'homePhone'); ?>
		<?php echo $form->textField($student,'homePhone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($student,'homePhone'); ?>
	</div>

        <div class="row buttons">
            <input type="submit" value="Next" name="btnNext" style="margin-left: 230px;">
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->