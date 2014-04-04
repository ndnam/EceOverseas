<?php
/* @var $this UserController */
/* @var $nextOfKin NextOfKin */
/* @var $familyMembers FamilyMember[] */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/validator.js');

$this->breadcrumbs = array(
    'Profile',
);

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'family-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'htmlOptions'=>array(
            'class'=>'grid-form',
        ),
)); ?>

<fieldset style="margin-bottom: 40px;">

    <legend>Next of Kin</legend>

    <?= $form->textFieldRow($nextOfKin, 'fullName'); ?>
    <?= $form->textFieldRow($nextOfKin, 'relationship'); ?>
    <?= $form->textFieldRow($nextOfKin, 'email'); ?>
    <?= $form->textFieldRow($nextOfKin, 'mobilePhone'); ?>
    <?= $form->textFieldRow($nextOfKin, 'officePhone'); ?>
    <?= $form->textFieldRow($nextOfKin, 'homePhone'); ?>

    <div class="control-group">
        <?php echo $form->error($nextOfKin, 'contactMethod'); ?>
    </div>

</fieldset>

<fieldset style="margin-bottom: 40px;">
 
    <legend>Family members</legend>

    <table class="table table-condensed" id="table-family-member">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Relationship</th>
                <th>Age </th>
                <th>Occupation</th>
                <th>Monthly Income</th>
            </tr>
        </thead>
        <tbody>
            
<?php foreach($familyMembers as $familyMember ) {
    $this->renderPartial('partial/_item_familymember',array(
        'familyMember'=>$familyMember,
        'form'=>$form,
        'id'=>$familyMember->id,
    ));
}
?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-member" onclick="addMember()">Add Family Member</a>
    <script>
        var lastMember = 0;
        var trMember = <?= CJSON::encode($this->renderPartial('partial/_item_familymember', array('id'=>'idRep','familyMember'=>new FamilyMember,'form'=>$form,'this'=>$this), true, false))?>;
        function addMember() {
            lastMember++;
            $('#table-family-member tbody').append(trMember.replace(/idRep/g, 'newRow' + lastMember));
        }
        function deleteMember(button) {
            button.parents('tr.member-item').detach();
        }
    </script>
    
</fieldset>

<div class="form-actions" style="padding-left: 20px">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
</div>

<?php $this->endWidget(); ?>

<script>
$(document).ready(function(){
    $('input.required, textarea.required, input.number').focusout();
});
</script>