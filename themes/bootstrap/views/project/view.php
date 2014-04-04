<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $applications StudentApplication[] */
/* @var $staffs Staff[] */
/* @var $staffRole integer */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'View Project',
);
$this->menu = array(
    array('label'=>'Delete Project','icon'=>'trash','url'=>'javascript:deleteProject(' . $model->id . ')'),
);
?>

<fieldset style="margin-bottom: 40px;">

    <legend><?= $model->title ?></legend>
    
    <?php $this->renderPartial('_project_form_edit',array(
        'model'=>$model,
        'staffRole'=>$staffRole,
    ));?>
    
</fieldset>

<h2>Student applications</h2>

<?php if (count($applications) > 0) { ?>
    <table style="width:auto">
        <tr>
            <th></th>
            <th></th>
            <th>Name</th>
            <th>Status</th>
            <th>Using PSEA</th>
            <th>Support Statement</th>
        </tr>
        <?php 
        $i = 0;
        foreach ($applications as $application) {
            $i++;
            $this->renderPartial('_student_application_view',array(
                'data'=>$application,
                'index'=>$i,
                'staffRole'=>$staffRole,
            ));
        }
        
        if ($staffRole == Project::ROLE_LEADER) { ?>
            <tr>
                <td colspan="4" class="btns"> 
                    <a href="javascript:;" id="btnSelectAllApps">Select all</a>
                    <a href="javascript:;" id="btnClearApps">Clear selection</a>
                    <br/>
                    <a href="javascript:;" class="btnChangeAppStt" id="2Shortlisted">Shortlist</a>
                    <a href="javascript:;" class="btnChangeAppStt" id="3Confirmed">Confirm</a>
                    <a href="javascript:;" class="btnChangeAppStt" id="0Rejected">Reject</a>
                </td>
            </tr>
        <?php 
        }?>
    </table>
<?php } else {
    echo "There is no student application.";
}
?>

<h2>Staff list</h2>

<table style="width:auto" class="staffList">
    <tr>
        <th></th>
        <th></th>
        <th>Name</th>
        <th>Role</th>
    </tr>
    <?php 
    $i = 0;
    foreach ($staffs as $staff) {
        $i++;
        $this->renderPartial('_project_staff_view',array(
            'data'=>$staff,
            'index'=>$i,
            'staffRole'=>$staffRole,
        ));
    }
    
    if ($staffRole == Project::ROLE_LEADER) { ?>
        <tr class="groupAddStaff">
            <td></td>
            <td></td>
            <td>
                <?= CHtml::dropDownList('staffSelect', null, array_merge(array('Select Staff'), 
                        ProjectController::toDropdownListArray(Project::getAvailableStaffs($model->id), 'id', 'fullName'))
                )?>
            </td>
            <td>
                <?= CHtml::dropDownList(
                        'roleSelect', 
                        null, 
                        Dictionary::items(Dictionary::TYPE_STAFF_ROLE),
                        ['class'=>'roleSelect']
                )?>
            </td>
            <td>
                <a href="javascript:;" id="btnAddStaff">+ Add Staff</a>
            </td>
        </tr>
    <?php 
    } ?>
</table>

<input type="hidden" id="projectId" value="<?= $model->id ?>">


