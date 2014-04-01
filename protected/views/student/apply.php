<?php
/* @var $this StudentController */
/* @var $project Project */
/* @var $application Application */
?>

<h1>Apply for <?= $project->title ?></h1>

<h2>Project Info</h2>

<div class="form">

    <div class="row">
        <label>Title</label>
        <p><?= CHtml::encode($project->title) ?></p>
    </div>

    <div class="row">
        <label>Description</label>
        <p><?= CHtml::encode($project->description) ?></p>
    </div>

    <div class="row">
        <label>Start Date</label>
        <p><?= CHtml::encode($project->startDate) ?></p>
    </div>

    <div class="row">
        <label>End Date</label>
        <p><?= CHtml::encode($project->endDate) ?></p>
    </div>

    <div class="row">
        <label>Team Size</label>
        <p><?= CHtml::encode($project->teamSize) ?></p>
    </div>

    <div class="row">
        <label>Deadline</label>
        <p><?= CHtml::encode($project->deadline) ?></p>
    </div>

    <div class="row">
        <label>Location</label>
        <p><?= CHtml::encode($project->location->name) ?></p>
    </div>

</div><!-- form -->
<div class="clear"></div>

<h2>Application form</h2>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($application,'usingPsea'); ?>
		<?php echo $form->checkBox($application,'usingPsea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($application,'support'); ?>
		<?php echo $form->textArea($application,'support'); ?>
	</div>

        <div class="row">
                <input type="submit" value="Save" name="btnSave" style="margin-left: 230px;">
        </div>

<?php $this->endWidget(); ?>

</div>

<script>
initSaveFormConfirmation();
</script>