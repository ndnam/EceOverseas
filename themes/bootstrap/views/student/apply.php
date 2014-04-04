<?php
/* @var $this StudentController */
/* @var $project Project */
/* @var $application Application */

$this->breadcrumbs=array(
	'Project'=>array('/student/publicProjects'),
        'Apply'
);
?>

<h2><center>Apply for <?= $project->title ?></center></h2>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'application-form',
        'type'=>'horizontal',
)); ?>

<fieldset style="margin-bottom: 40px;">
 
    <legend>Project Info</legend>

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

</fieldset>

<fieldset style="margin-bottom: 40px;">
 
    <legend>Application form</legend>

    <?= $form->checkBoxRow($application, 'usingPsea'); ?>
    <?= $form->textAreaRow($application, 'support',array('maxlength'=>500)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
    </div>
</fieldset>
<?php $this->endWidget(); ?>
