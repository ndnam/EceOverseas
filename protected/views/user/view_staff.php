<?php
/* @var $this UserController */
/* @var $staff Staff */
/* @var $projectStaffs StaffProject */

$this->breadcrumbs=array(
    'User',
    'Profile',
);
?>

<h2><center>Staff profile</center></h2>


<fieldset>
    <legend>Information</legend>
    
    <div class="form-horizontal">

        <div class="control-group">
            <label class="control-label">Initial</label>
            <div class="controls">
                <p class="help-block"><?=$staff->initial?></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Full Name</label>
            <div class="controls">
                <p class="help-block"><?=$staff->fullName?></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <p class="help-block"><?=$staff->email?></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Phone</label>
            <div class="controls">
                <p class="help-block"><?=$staff->phone?></p>
            </div>
        </div>

    </div>
    
</fieldset>

<fieldset>
    <legend>Projects</legend>
    
    <table>
        <tr>
            <th></th>
            <th>Project name</th>
            <th>Role</th>
        </tr>
    <?php 
    $i = 0;
    foreach ($projectStaffs as $projectStaff) :
        $i++;
    ?>
        <tr>
            <td><?= $i?></td>
            <td><?= CHtml::link($projectStaff->project->title,array('/project/'.$projectStaff->project->id))?></td>
            <td><?= Dictionary::item(Dictionary::TYPE_STAFF_ROLE, $projectStaff->role)?>
        </tr>
    <?php endforeach;?>
    </table>
    
</fieldset>
