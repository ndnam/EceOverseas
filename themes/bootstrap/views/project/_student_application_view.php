<?php 
/* @var $data StudentApplication */
/* @var $index integer */
/* @var $staffRole integer*/
$studentUser = User::model()->findByAttributes(array('studentId'=>$data->studentId));
$student = UserController::loadStudent($data->studentId);
?>
<tr>
    <td>
        <?php if ($staffRole == Project::ROLE_LEADER) { ?>
            <input type="checkbox" class="cbStdApp" id="<?= $data->id ?>">
        <?php 
        }?>
    </td>
    <td><?= $index . '.' ?></td>
    <td><?= CHtml::link(CHtml::encode($student->fullName), array('/user/'.$studentUser->username), array('class'=> count($student->profileErrors) > 0 ? 'error' : '')) ?></td>
    <td class="app-status"><?= Dictionary::item(Dictionary::TYPE_APPLICATION_STATUS,$data->status)?> </td>
    <td><?= $data->usingPsea ? 'Yes' : 'No' ?></td>
    <td><?= $data->support?></td>
</tr>

