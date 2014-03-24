<?php 
/* @var $data ProjectStaff */
/* @var $index integer */
?>
<tr>
    <td><input type="checkbox" class="cbPrjStaff" id="staff<?= $data->id ?>"></td>
    <td class="listIndex"><?= $index . '.' ?></td>
    <td><?= CHtml::link(CHtml::encode($data->staff->fullName), array('staff/view', 'id'=>$data->staff->id)) ?></td>
    <td>
        <span class="staffRole"><?= Dictionary::item(Dictionary::TYPE_STAFF_ROLE, $data->role)?></span>
        <?= CHtml::dropDownList(
                'roleSelect' . $data->id, 
                $data->role, 
                Dictionary::items(Dictionary::TYPE_STAFF_ROLE),
                ['class'=>'roleSelect hide', 'projectStaffId'=>$data->id])
        ?>
    </td>
    <td>
        <a href="javascript:;" class="btnDoneEditStaff hide">Done</a>
        <a href="javascript:;" class="btnEditStaff">Edit</a>
    </td>
    <td><a href="javascript:;" class="btnRemoveStaff" prjStaffId="<?= $data->id ?>">Remove</a></td>
</tr>