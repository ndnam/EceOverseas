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
        <?php echo $form->dropDownList($pastTrip,"[$id]country",DictCountry::getCountries(),array('style'=>'width:180px')); ?>
    </td>
    <td>
        <?php echo $form->textField($pastTrip,"[$id]duration",array('class'=>'required','style'=>'width:90px')); ?>
    </td>
    <td>
        <?php echo $form->textField($pastTrip,"[$id]capacity",array('class'=>'required','style'=>'width:80px')); ?>
    </td>
    <td>
        <?php echo $form->checkBox($pastTrip,"[$id]isSubsidized",array('class'=>'cbIsSubsidized','style'=>'width:70px')); ?>
    </td>
    <td>
        <?php 
        $htmlOptions = array('style'=>'width:55px');
        if (!$pastTrip->isSubsidized) 
            $htmlOptions['disabled'] = 'disabled';
        echo $form->textField($pastTrip,"[$id]amount", $htmlOptions); ?>
    </td>
    <td>
        <a href="javascript:;" class="btn btn-warning btn-delete-record" onclick="deletePastTrip($(this))">Delete</a>
    </td>
</tr>
<script>
$(document).ready(function(){
    initTabularItem($('#pasttrip-item-<?=$id?>'));
    initPastTripForm('#pasttrip-item-<?=$id?>');
});

</script>

