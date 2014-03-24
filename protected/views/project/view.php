<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $applications StudentApplication[] */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'View Project',
);
?>
<h1><?= $model->title ?></h1>

<?php $this->renderPartial('_project_form_edit',array(
    'model'=>$model,
));?>

<h2>Student applications</h2>

<table style="width:auto">
    <tr>
        <th></th>
        <th></th>
        <th>Name</th>
        <th>Status</th>
    </tr>
    <?php 
    $i = 0;
    foreach ($applications as $application) {
        $i++;
        $this->renderPartial('_student_application_view',array(
            'data'=>$application,
            'index'=>$i,
        ));
    }?>
    <tr>
        <td colspan="4" class="btns"> 
            <a href="javascript:;" id="btnSelectAllApps">Select all</a>
            <a href="javascript:;" id="btnClearApps">Clear</a>
            <br/>
            <a href="javascript:;" class="btnChangeAppStt" id="2Shortlisted">Shortlist</a>
            <a href="javascript:;" class="btnChangeAppStt" id="3Confirmed">Confirm</a>
            <a href="javascript:;" class="btnChangeAppStt" id="0Rejected">Reject</a>
        </td>
    </tr>
</table>


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
        ));
    }?>
    <tr class="groupAddStaff">
        <td colspan="4">
            <?= CHtml::dropDownList('staffSelect', null, Staff::getStaffList()) ?>
            <?= CHtml::dropDownList(
                    'roleSelect', 
                    null, 
                    Dictionary::items(Dictionary::TYPE_STAFF_ROLE),
                    ['class'=>'roleSelect'])
            ?>
            <a href="javascript:;" id="btnAddStaff">+ Add Staff</a>
        </td>
    </tr>
</table>

<input type="hidden" id="projectId" value="<?= $model->id ?>">


