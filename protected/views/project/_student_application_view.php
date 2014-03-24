<?php 
/* @var $data StudentApplication */
/* @var $index integer */
?>
<tr>
    <td><input type="checkbox" class="cbStdApp" id="<?= $data->id ?>"></td>
    <td><?= $index . '.' ?></td>
    <td><?= CHtml::link(CHtml::encode($data->student->fullName), array('application/view', 'id'=>$data->id)) ?></td>
    <td class="app-status"><?= Dictionary::item(Dictionary::TYPE_APPLICATION_STATUS,$data->status)?> </td>
</tr>

