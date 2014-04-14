<?php
/* @var $id int */
/* @var $studentCca StudentCca */
/* @var $form CActiveForm */
?>

<tr class="cca-item" id="cca-item-<?=$id?>">
    <td>
        <?php echo $form->checkBox($studentCca,"[$id]isInNP",array('style'=>'width:55px')); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]period",array('class'=>'required','style'=>'width:120px')); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]organization",array('class'=>'required','style'=>'width:200px')); ?>
    </td>
    <td>
        <?php echo $form->textField($studentCca,"[$id]position",array('class'=>'required','style'=>'width:100px')); ?>
    </td>
    <td>
        <?php echo $form->textArea($studentCca,"[$id]description",array('style'=>'height:22px;width:225px')); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn btn-warning btn-delete-record" onclick="deleteCCA($(this))">Delete</a>
    </td>
    
    <script>
    $(document).ready(function(){
        initTabularItem($('#cca-item-<?=$id?>'));
    });
    </script>
</tr>

