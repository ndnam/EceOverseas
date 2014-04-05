<?php
/* @var $this ProjectController */
/* @var $project Project */

$this->breadcrumbs=array(
	'Projects'=>array('/student/publicProjects'),
	$project->title,
);

$student = UserController::loadStudent();
if ($student->appliedFor($project->id)) {
    $this->menu = array(
        array('label'=>'Delete your application',
            'icon'=>'pencil','url'=>'javascript:;',
            'itemOptions'=>array(
                'class'=>'btn-del-app',
                'appid'=>StudentApplication::model()->findByAttributes(array('studentId'=>$student->id,'projectId'=>$project->id))->id
            ),
        ),
    );
} else if (count($student->profileErrors) == 0) {
    $this->menu = array(
        array('label'=>'Apply for this project','icon'=>'pencil','url'=>array('/student/apply/'.$project->id)),
    );
}
?>

<h2 id="project-title"><?= $project->title?></h2>

<form class="form-horizontal">
    
    <div class="control-group">
        <label class="control-label">Title</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->title) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Description</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->description) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Start Date</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->startDate) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">End Date</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->endDate) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Team Size</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->teamSize) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Deadline</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->deadline) ?></p>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Location</label>
        <div class="controls">
            <p class="help-block"><?= CHtml::encode($project->location->name) ?></p>
        </div>
    </div>
    
</form>






