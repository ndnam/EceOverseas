<?php
/* @var $this StudentController */
/* @var $nextOfKin NextOfKin */
/* @var $form CActiveForm */
?>

<h1>Application - step 4 - Family Details</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'family-step4-form',
	'enableAjaxValidation'=>false,
)); ?>

    <div class="next-of-kin">
        
        <div class="row">
            <h2>Next of Kin</h2>
        </div>
        
	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'fullName'); ?>
		<?php echo $form->textField($nextOfKin,'fullName'); ?>
		<?php echo $form->error($nextOfKin,'fullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'relationship'); ?>
		<?php echo $form->textField($nextOfKin,'relationship'); ?>
		<?php echo $form->error($nextOfKin,'relationship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'email'); ?>
		<?php echo $form->textField($nextOfKin,'email'); ?>
		<?php echo $form->error($nextOfKin,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'mobilePhone'); ?>
		<?php echo $form->textField($nextOfKin,'mobilePhone'); ?>
		<?php echo $form->error($nextOfKin,'mobilePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'officePhone'); ?>
		<?php echo $form->textField($nextOfKin,'officePhone'); ?>
		<?php echo $form->error($nextOfKin,'officePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($nextOfKin,'homePhone'); ?>
		<?php echo $form->textField($nextOfKin,'homePhone'); ?>
		<?php echo $form->error($nextOfKin,'homePhone'); ?>
	</div>

        <div class="row">
                <i>Please provide at least one contact method</i>
        </div>
        
    </div>

    <div class="family-members">
        
        <div class='row'>
            <h2>Family members</h2>
        </div>
        
        <?php echo $form->error($student,"familyMembers"); ?>
        
        <?php
            if (count($familyMembers)) {
                foreach ($familyMembers as $id=>$familyMember) {
                    $this->renderPartial('partial_forms/_family_member', array('id'=>$id, 'familyMember'=>$familyMember, 'form'=>$form, 'this'=>$this));
                }
            } else 
                $this->renderPartial('partial_forms/_family_member', array('id'=>0, 'familyMember'=>new FamilyMember, 'form'=>$form, 'this'=>$this));
        ?>
        
        <div class="buttons">
            <script>
                var lastFamilyMember = 0;
                var trFamilyMember = <?= CJSON::encode($this->renderPartial('partial_forms/_family_member', array('id'=>'idRep','familyMember'=> new FamilyMember,'form'=>$form,'this'=>$this), true, false))?>;
                function addFamilyMember(button) {
                    lastFamilyMember++;
                    button.parents('form').find('div.family-members .buttons').before(trFamilyMember.replace(/idRep/g, 'newRow' + lastFamilyMember));
                }
                function deleteFamilyMember(button) {
                    button.parents('div.family-member').detach();
                }
            </script>
            <?php echo CHtml::button('Add Family Member',array('onClick'=>'addFamilyMember($(this))')); ?>
        </div>
        
    </div>
    <?= $this->renderPartial('partial_forms/_apply_form_buttons',array('step'=>4))?>

<?php $this->endWidget(); ?>

</div><!-- form -->