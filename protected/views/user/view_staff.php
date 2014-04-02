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

<div class="form">
    
    <div class="row">
        <label>Initial</label>
        <p><?=$staff->initial?></p>
    </div>
    
    <div class="row">
        <label>Full Name</label>
        <p><?=$staff->fullName?></p>
    </div>
    
    <div class="row">
        <label>Email</label>
        <p><?=$staff->email?></p>
    </div>
    
    <div class="row">
        <label>Phone</label>
        <p><?=$staff->phone?></p>
    </div>

</div>
<div class="clear"></div>

<h2>Projects</h2>
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
