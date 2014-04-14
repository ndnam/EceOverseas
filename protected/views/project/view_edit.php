<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $applications StudentApplication[] */
/* @var $staffs Staff[] */
/* @var $staffRole integer */

$this->breadcrumbs=array(
	'Projects'=>array('/project'),
	$model->title,
);
if ($model->status == Project::STATUS_NEW) {
    $this->menu = array(
        array('label'=>'Delete Project',
            'icon'=>'trash',
            'url'=>'javascript:deleteProject(' . $model->id . ')',
            'itemOptions'=>array('id'=>'btn-delete-project')),
    );
}
?>

<h2 id="project-title"><?= $model->title?></h2>

<fieldset style="margin-bottom: 40px;">

    <legend>Project Details</legend>
    
    <?php $this->renderPartial('_project_form_edit',array(
        'model'=>$model,
        'staffRole'=>$staffRole,
    ));?>
    
</fieldset>

<fieldset style="margin-bottom: 40px;">

    <legend>Student applications</legend>
    
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
        }?>
    </table>
        
    <?php if ($staffRole == Project::ROLE_LEADER) { ?>
    <div class="btn-group">
        <a href="javascript:;" class="btn btn-info" id="btnSelectAllApps">Select all</a>
        <a href="javascript:;" class="btn btn-info" id="btnClearApps">Clear selection</a>
        <a href="javascript:;" class="btn btn-warning btnChangeAppStt" id="2Shortlisted">Shortlist</a>
        <a href="javascript:;" class="btn btn-warning btnChangeAppStt" id="3Confirmed">Confirm</a>
        <a href="javascript:;" class="btn btn-warning btnChangeAppStt" id="0Rejected">Reject</a>
    </div>
    <?php }
    } else {
        echo "There is no student application.";
    } ?>
</fieldset>

<fieldset style="margin-bottom: 40px;">

    <legend>Staff list</legend>
    
    <table style="width:auto" class="staffList">
        <tr>
            <th></th>
            <th></th>
            <th>Name</th>
            <th>Role</th>
        </tr>
        <?php 
        $i = 0;
        $soleAdmin = count($staffs) == 1; // If there is only one admin in the project
        foreach ($staffs as $staff) {
            $i++;
            $this->renderPartial('_project_staff_view',array(
                'data'=>$staff,
                'index'=>$i,
                'staffRole'=>$staffRole,
                'hideButtons'=>$soleAdmin,
            ));
        }

        if ($staffRole == Project::ROLE_LEADER) { ?>
            <tr class="groupAddStaff">
                <td></td>
                <td></td>
                <td>
                    <?= CHtml::dropDownList('staffSelect', null, 
                            ControllerHelper::toDropdownListArray(Project::getAvailableStaffs($model->id), 'id', 'fullName')
                    )?>
                </td>
                <td>
                    <?= CHtml::dropDownList(
                            'roleSelect', 
                            null, 
                            Dictionary::items(Dictionary::TYPE_STAFF_ROLE),
                            ['class'=>'roleSelect','style'=>'width:140px']
                    )?>
                </td>
                <td>
                    <a href="javascript:;" class="btn btn-info" id="btnAddStaff">+ Add Staff</a>
                </td>
            </tr>
        <?php 
        } ?>
    </table>
    
</fieldset>

<input type="hidden" id="projectId" value="<?= $model->id ?>">


