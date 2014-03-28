<?php
/* @var $id int */
/* @var $studentCca StudentCca */
/* @var $form CActiveForm */
?>

<tr class="cca-item" id="cca-item-<?=$id?>">
    <td>
        <?php echo $form->checkBox($studentCca,"[$id]isInNP"); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]period",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]organization",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]position",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textArea($studentCca,"[$id]description"); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn-delete-record" onclick="deleteCCA($(this))">Delete</a>
    </td>
</tr>
<script>
$(document).ready(function(){
    initTabularItem($('#cca-item-<?=$id?>'));
});

</script>

