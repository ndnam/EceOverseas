<?php
/* @var $id int */
/* @var $familyMember FamilyMember */
/* @var $form CActiveForm */
?>

<tr class="member-item" id="member-item-<?=$id?>">
    <td>
        <?php echo $form->textField($familyMember,"[$id]fullname",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]relationship",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]age",array('class'=>'required number')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]occupation",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]monthlyIncome",array('class'=>'required number')); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn-delete-record" onclick="deleteMember($(this))">Delete</a>
    </td>
    <td>
        <?= $familyMember->validate()?>
    </td>
</tr>
<script>
$(document).ready(function(){
    initTabularItem($('#member-item-<?=$id?>'));
});

</script>

