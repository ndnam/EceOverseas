<?php
/* @var $this UserController */
/* @var $nextOfKin NextOfKin */
/* @var $familyMembers FamilyMember[] */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/validator.js');

$this->breadcrumbs = array(
    'Profile',
);


$form = $this->beginWidget('CActiveForm', array(
    'id' => 'family-form',
    'enableAjaxValidation' => true,
));
?>

<div class="form">

    <div class="row">
        <h2>Next of Kin</h2>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'fullName'); ?>
        <?php echo $form->textField($nextOfKin, 'fullName'); ?>
        <?php echo $form->error($nextOfKin, 'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'relationship'); ?>
        <?php echo $form->textField($nextOfKin, 'relationship'); ?>
        <?php echo $form->error($nextOfKin, 'relationship'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'email'); ?>
        <?php echo $form->textField($nextOfKin, 'email'); ?>
        <?php echo $form->error($nextOfKin, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'mobilePhone'); ?>
        <?php echo $form->textField($nextOfKin, 'mobilePhone'); ?>
        <?php echo $form->error($nextOfKin, 'mobilePhone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'officePhone'); ?>
        <?php echo $form->textField($nextOfKin, 'officePhone'); ?>
        <?php echo $form->error($nextOfKin, 'officePhone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($nextOfKin, 'homePhone'); ?>
        <?php echo $form->textField($nextOfKin, 'homePhone'); ?>
        <?php echo $form->error($nextOfKin, 'homePhone'); ?>
    </div>

    <div class="row">
        <?php echo $form->error($nextOfKin, 'contactMethod'); ?>
    </div>
    
</div>

<div class="clear"></div>

<div class="family-members list-module">
    <div class="module-title">Family members</div>
    <div class="module-list">
        <table class="module-table">
            <tr>
                <th><?=CHtml::activeLabelEX(FamilyMember::model(),'fullName')?></th>
                <th><?=CHtml::activeLabelEX(FamilyMember::model(),'relationship')?></th>
                <th><?=CHtml::activeLabelEX(FamilyMember::model(),'age')?></th>
                <th><?=CHtml::activeLabelEX(FamilyMember::model(),'occupation')?></th>
                <th><?=CHtml::activeLabelEX(FamilyMember::model(),'monthlyIncome')?></th>
            </tr>
            <?php foreach($familyMembers as $familyMember ) {
                $this->renderPartial('partial/_item_familymember',array(
                    'familyMember'=>$familyMember,
                    'form'=>$form,
                    'id'=>$familyMember->id,
                ));
            }
            ?>
            <tr class="buttons">
                <td colspan="3">
                    <script>
                        var lastMember = 0;
                        var trMember = <?= CJSON::encode($this->renderPartial('partial/_item_familymember', array('id'=>'idRep','familyMember'=>new FamilyMember,'form'=>$form,'this'=>$this), true, false))?>;
                        function addMember(button) {
                            lastMember++;
                            button.parents('table').find('.buttons').before(trMember.replace(/idRep/g, 'newRow' + lastMember));
                        }
                        function deleteMember(button) {
                            button.parents('tr.member-item').detach();
                        }
                    </script>
                    <a href="javascript:;" id="btn-add-member" onclick="addMember($(this))">Add Family Member</a>
                </td>
            </tr>
        </table>
    </div>
</div>
<input type="submit" value="Save" name="btnSave">
<?php $this->endWidget(); ?>
<script>
$(document).ready(function(){
    $('input.required, textarea.required, input.number').focusout();
});
</script>