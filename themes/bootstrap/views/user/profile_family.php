<?php
/* @var $this UserController */
/* @var $nextOfKin NextOfKin */
/* @var $familyMembers FamilyMember[] */
/* @var $form CActiveForm */

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
    
    <p>You need to provide at least one family member or guardian</p>
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
            
<?php 
if (count($familyMembers) > 0) {
    foreach($familyMembers as $familyMember ) {
        $this->renderPartial('partial/_item_familymember',array(
            'familyMember'=>$familyMember,
            'form'=>$form,
            'id'=>$familyMember->id,
        ));
    }
} else $this->renderPartial('partial/_item_familymember',array(
            'familyMember'=>new FamilyMember,
            'form'=>$form,
            'id'=>'newRow0',
        ));
?>
        </tbody>
    </table>
    
    <a href="javascript:;" class="btn btn-info" id="btn-add-member" onclick="addMember()">Add Family Member</a>
    <script>
        var lastMember = 0;
        $('.member-item').each(function(){
            var id = $(this).attr('id').substr(12,20);
            if (id.match(/^newRow\d+$/)) {
                var temp = parseInt(id.substr(6,10));
                if (temp > lastMember) {
                    lastMember = temp;
                }
            }
        });
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
//$(document).ready(function(){
//    $('input.required, textarea.required, input.number').focusout();
//});
</script>