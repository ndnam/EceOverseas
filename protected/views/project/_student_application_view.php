<?php 
/* @var $data StudentApplication */
/* @var $index integer */
/* @var $staffRole integer*/
?>
<tr>
    <td>
        <?php if ($staffRole == Project::ROLE_LEADER) { ?>
            <input type="checkbox" class="cbStdApp" id="<?= $data->id ?>">
        <?php 
        }?>
    </td>
    <td><?= $index . '.' ?></td>
    <td><?= CHtml::link(CHtml::encode($data->student->fullName), array('/project/application', 'id'=>$data->id)) ?></td>
    <td class="app-status"><?= Dictionary::item(Dictionary::TYPE_APPLICATION_STATUS,$data->status)?> </td>
</tr>

