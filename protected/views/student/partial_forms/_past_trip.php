<?php
/* @var $id int */
/* @var $studentCca StudentCca */
/* @var $form CActiveForm */
/* @var $this StudentController */
?>

<div class="pasttrip">

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]programName"); ?>
        <?php echo $form->textField($pastTrip,"[$id]programName"); ?>
        <?php echo $form->error($pastTrip,"[$id]programName"); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]country"); ?>
        <?php echo $form->dropDownList($pastTrip,"[$id]country",DictCountry::getCountries()); ?>
        <?php echo $form->error($pastTrip,"[$id]country"); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]duration"); ?>
        <?php echo $form->textField($pastTrip,"[$id]duration"); ?>
        <?php echo $form->error($pastTrip,"[$id]duration"); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]capacity"); ?>
        <?php echo $form->textField($pastTrip,"[$id]capacity"); ?>
        <?php echo $form->error($pastTrip,"[$id]capacity"); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]isSubsidized"); ?>
        <?php echo $form->checkBox($pastTrip,"[$id]isSubsidized", array('class'=>'cbIsSubsidized')); ?>
        <?php echo $form->error($pastTrip,"[$id]isSubsidized"); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($pastTrip,"[$id]amount"); ?>
        <?php echo $form->textField($pastTrip,"[$id]amount", $pastTrip->isSubsidized ? NULL : array('disabled'=>'disabled')); ?>
        <?php echo $form->error($pastTrip,"[$id]amount"); ?>
    </div>
    
    <div class="row">
        <?php echo CHtml::button('Delete',array('onClick'=>'deletePastTrip($(this)); return false;')); ?>
    </div>
    
    <script>
        initPastTripForm();
    </script>
    
</div>
