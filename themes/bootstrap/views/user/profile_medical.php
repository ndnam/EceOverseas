<?php
/* @var $this UserController */
/* @var $medicalInfo MedicalInfo */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
    'Profile',
);

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'medical-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>

    <fieldset>
 
        <legend>Medical History</legend>
        
        <?= $form->checkBoxRow($medicalInfo, 'heartProblem'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'fits'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'faintingSpell'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'diabetes'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'asthma'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'migraine'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'visionProblem'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'colorBlind'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'earProblem'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'fractures'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'dislocations'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'carrierStatus'); ?>
        <?= $form->textAreaRow($medicalInfo, 'otherMedicalHistory',array('maxlength'=>500)); ?>
        <?= $form->textAreaRow($medicalInfo, 'currentMedications',array('maxlength'=>500)); ?>
        <?= $form->textAreaRow($medicalInfo, 'otherMedicalConditions',array('maxlength'=>500)); ?>
        <?= $form->textAreaRow($medicalInfo, 'physicalDisabilities',array('maxlength'=>500)); ?>
        <?= $form->textAreaRow($medicalInfo, 'allergies',array('maxlength'=>500)); ?>

        <legend>Dietary Requirements / Food restrictions</legend>
        <?= $form->checkBoxRow($medicalInfo, 'vegetarian'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'halal'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'noSeafood'); ?>
        <?= $form->checkBoxRow($medicalInfo, 'noBeef'); ?>
        <?= $form->textAreaRow($medicalInfo, 'otherFoodRestrictions',array('maxlength'=>500)); ?>
        
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
        </div>
        
    </fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->