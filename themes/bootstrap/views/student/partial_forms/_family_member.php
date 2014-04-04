<?php
/* @var $id int */
/* @var $familyMember FamilyMember */
/* @var $form CActiveForm */
/* @var $this StudentController */
?>

<div class="family-member">

	<div class="row">
		<?php echo $form->labelEx($familyMember,"[$id]relationship"); ?>
		<?php echo $form->textField($familyMember,"[$id]relationship"); ?>
		<?php echo $form->error($familyMember,"[$id]relationship"); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($familyMember,"[$id]fullname"); ?>
		<?php echo $form->textField($familyMember,"[$id]fullname"); ?>
		<?php echo $form->error($familyMember,"[$id]fullname"); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($familyMember,"[$id]age"); ?>
		<?php echo $form->textField($familyMember,"[$id]age"); ?>
		<?php echo $form->error($familyMember,"[$id]age"); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($familyMember,"[$id]occupation"); ?>
		<?php echo $form->textField($familyMember,"[$id]occupation"); ?>
		<?php echo $form->error($familyMember,"[$id]occupation"); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($familyMember,"[$id]monthlyIncome"); ?>
		<?php echo $form->textField($familyMember,"[$id]monthlyIncome"); ?>
		<?php echo $form->error($familyMember,"[$id]monthlyIncome"); ?>
	</div>

        <div class="row">
                <?php echo CHtml::button('Delete',array('onClick'=>'deleteFamilyMember($(this)); return false;')); ?>
        </div>
    
</div><!-- form -->