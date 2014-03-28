<?php
/* @var $id int */
/* @var $pastTrip PastTrip */
/* @var $form CActiveForm */
?>

<tr class="pasttrip-item" id="pasttrip-item-<?=$id?>">
    <td>
        <?php echo $form->textField($pastTrip,"[$id]programName",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->dropDownList($pastTrip,"[$id]country",DictCountry::getCountries()); ?>
    </td>
    <td>
        <?php echo $form->textField($pastTrip,"[$id]duration",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->textField($pastTrip,"[$id]capacity",array('class'=>'required')); ?>
    </td>
    <td>
        <?php echo $form->checkBox($pastTrip,"[$id]isSubsidized",array('class'=>'cbIsSubsidized')); ?>
    </td>
    <td>
        <?php echo $form->textField($pastTrip,"[$id]amount", $pastTrip->isSubsidized ? NULL : array('disabled'=>'disabled')); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn-delete-record" onclick="deletePastTrip($(this))">Delete</a>
    </td>
</tr>
<script>
$(document).ready(function(){
    initTabularItem($('#pasttrip-item-<?=$id?>'));
    initPastTripForm('#pasttrip-item-<?=$id?>');
});

</script>

