<?php
/* @var $id int */
/* @var $studentCca StudentCca */
/* @var $form CActiveForm */
/* @var $this StudentController */
?>

<div class="cca">
     
    <div class="row">
            <?php echo $form->labelEx($studentCca,"[$id]isInNP"); ?>
            <?php echo $form->checkBox($studentCca,"[$id]isInNP"); ?>
            <?php echo $form->error($studentCca,"[$id]isInNP"); ?>
    </div>

    <div class="row">
            <?php echo $form->labelEx($studentCca,"[$id]period"); ?>
            <?php echo $form->textField($studentCca,"[$id]period"); ?>
            <?php echo $form->error($studentCca,"[$id]period"); ?>
    </div>

    <div class="row">
            <?php echo $form->labelEx($studentCca,"[$id]organization"); ?>
            <?php echo $form->textField($studentCca,"[$id]organization"); ?>
            <?php echo $form->error($studentCca,"[$id]organization"); ?>
    </div>

    <div class="row">
            <?php echo $form->labelEx($studentCca,"[$id]position"); ?>
            <?php echo $form->textField($studentCca,"[$id]position"); ?>
            <?php echo $form->error($studentCca,"[$id]position"); ?>
    </div>

    <div class="row">
            <?php echo $form->labelEx($studentCca,"[$id]description"); ?>
            <?php echo $form->textArea($studentCca,"[$id]description"); ?>
            <?php echo $form->error($studentCca,"[$id]description"); ?>
    </div>

    <div class="row">
            <?php echo CHtml::button('Delete',array('onClick'=>'deleteCCA($(this)); return false;')); ?>
    </div>
     
</div>