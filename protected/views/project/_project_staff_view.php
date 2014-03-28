<?php 
/* @var $data ProjectStaff */
/* @var $index integer */
/* @var $staffRole integer */
?>
<tr>
    <td>
        <?php if ($staffRole == Project::ROLE_LEADER) { ?>
            <input type="checkbox" class="cbPrjStaff" id="staff<?= $data->id ?>">
        <?php 
        }?>
    </td>
    
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
    
    <?php if ($staffRole == Project::ROLE_LEADER) { 
        $staffId = $data->staffId;
    ?>
        <td>
            <a href="javascript:;" class="btnDoneEditStaff hide" id="btnDoneEditStaff<?=$staffId ?>">Done</a>
            <a href="javascript:;" class="btnEditStaff" id="btnEditStaff<?=$staffId ?>">Edit</a>
            <a href="javascript:;" class="btnRemoveStaff" prjStaffId="<?= $data->id ?>" id="btnRemoveStaff<?=$staffId ?>">Remove</a>
        </td>
    <?php 
    }?>
    
</tr>