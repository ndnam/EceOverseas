<?php
/* @var $id int */
/* @var $familyMember FamilyMember */
/* @var $form CActiveForm */
?>

<tr class="member-item" id="member-item-<?=$id?>">
    <td>
        <?php echo $form->textField($familyMember,"[$id]fullname",array('class'=>'required','style'=>'width:220px')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]relationship",array('class'=>'required','style'=>'width:100px')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]age",array('class'=>'required number','style'=>'width:30px')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]occupation",array('class'=>'required','style'=>'width:120px')); ?>
    </td>
    <td>
        <?php echo $form->textField($familyMember,"[$id]monthlyIncome",array('class'=>'required number','style'=>'width:100px')); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn btn-warning btn-delete-record" onclick="deleteMember($(this))">Delete</a>
    </td>
</tr>
<script>
$(document).ready(function(){
    initTabularItem($('#member-item-<?=$id?>'));
});

</script>

