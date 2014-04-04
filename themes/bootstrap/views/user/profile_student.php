<?php
/* @var $this UserController */
/* @var $student Student */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Profile',
);

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'student-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>

    <fieldset>
 
        <legend>Student Info</legend>
        
        <?= $form->textFieldRow($student, 'firstName'); ?>
        <?= $form->textFieldRow($student, 'familyName',array('maxlength'=>50)); ?>
        <?= $form->dropDownListRow($student, 'gender',array(1=>'Male',2=>'Female')); ?>
        <?= $form->datepickerRow($student,'birthday',array('options' => array('dateFormat'=>'yy-mm-dd'))); ?>
        <?= $form->textFieldRow($student, 'studentNumber',array('maxlength'=>10)); ?>
        <?= $form->textFieldRow($student, 'school',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($student, 'course',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($student, 'level',array('maxlength'=>10)); ?>
        <?= $form->textFieldRow($student, 'race',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($student, 'religion',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($student, 'nationality',array('maxlength'=>50)); ?>
        <?= $form->checkBoxRow($student, 'isPR'); ?>
        <?= $form->textFieldRow($student, 'nricNumber',array('maxlength'=>10)); ?>
        <?= $form->textFieldRow($student, 'passportNumber',array('maxlength'=>50)); ?>
        <?= $form->dropDownListRow($student, 'issuingCountry',DictCountry::getCountries()); ?>
        <?= $form->datepickerRow($student,'issuingDate',array('options' => array('dateFormat'=>'yy-mm-dd'))); ?>
        <?= $form->datepickerRow($student,'expiryDate',array('options' => array('dateFormat'=>'yy-mm-dd'))); ?>
        <?= $form->dropDownListRow($student, 'tshirtSize',Dictionary::items(Dictionary::TYPE_TSHIRT_SIZE)); ?>
        <?= $form->dropDownListRow($student, 'bloodGroup',Dictionary::items(Dictionary::TYPE_BLOOD_GROUP)); ?>
        <?= $form->dropDownListRow($student, 'swimmingAbility',Dictionary::items(Dictionary::TYPE_SWIMMING_ABILITY)); ?>
        <?= $form->textAreaRow($student, 'homeAddress',array('maxlength'=>200)); ?>
        <?= $form->textFieldRow($student, 'postalCode',array('maxlength'=>10)); ?>
        <?= $form->dropDownListRow($student, 'housingType',Dictionary::items(Dictionary::TYPE_HOUSING_TYPE)); ?>
        <?= $form->textFieldRow($student, 'personalEmail',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($student, 'mobilePhone',array('maxlength'=>20)); ?>
        <?= $form->textFieldRow($student, 'homePhone',array('maxlength'=>20)); ?>
        
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
        </div>
        
    </fieldset>

        
<?php $this->endWidget(); ?>
