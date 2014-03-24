<?php
/* @var $this ProjectController */
/* @var $project Project */
/* @var $location Location */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'Create Project',
);
?>
<h1>Create new project</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-create-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($project); ?>

	<div class="row">
		<?php echo $form->labelEx($project,'title'); ?>
		<?php echo $form->textField($project,'title'); ?>
		<?php echo $form->error($project,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'description'); ?>
		<?php echo $form->textArea($project,'description'); ?>
		<?php echo $form->error($project,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'startDate'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[startDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value'=>$project->startDate,
                )); ?>
		<?php echo $form->error($project,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'endDate'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[endDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value'=>$project->endDate,
                )); ?>
		<?php echo $form->error($project,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'teamSize'); ?>
		<?php echo $form->textField($project,'teamSize'); ?>
		<?php echo $form->error($project,'teamSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'deadline'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[deadline]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value'=>$project->deadline,
                )); ?>
		<?php echo $form->error($project,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($project,'locationId'); ?>
		<?php echo $form->dropdownList($project,'locationId',Location::loadLocations()); ?>
	</div>
    
        <div class="row">
            <div class="cell"><p></p></div>
            <div class="cell">
                <a href="javascript:;" id="btnNewLocation">New location</a>
                <a href="javascript:;" id="btnCancel" class="hide">Cancel</a>
            </div>
        </div>
    
        <div class="locationForm hide">
            <div class="row">
                    <?php echo $form->labelEx($location,'name'); ?>
                    <?php echo $form->textField($location,'name',array('disabled'=>true)); ?>
                    <?php echo $form->error($location,'name'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($location,'city'); ?>
                    <?php echo $form->textField($location,'city',array('disabled'=>true)); ?>
                    <?php echo $form->error($location,'city'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($location,'country'); ?>
                    <?php echo $form->textField($location,'country',array('disabled'=>true)); ?>
                    <?php echo $form->error($location,'country'); ?>
            </div>
        </div>
             


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
