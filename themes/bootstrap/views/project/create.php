<?php
/* @var $this ProjectController */
/* @var $project Project */
/* @var $location Location */
/* @var $form TbActiveForm */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'Create Project',
);
?>
<h2><center>Create new project</center></h2>

<div class="form">
    
<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'project-create-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); 
?>
        <?= $form->textFieldRow($project, 'title'); ?>
        <?= $form->textAreaRow($project, 'description'); ?>
        <?= $form->datepickerRow($project,'startDate',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy','style'=>'width:100px'))); ?>
        <?= $form->datepickerRow($project,'endDate',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy','style'=>'width:100px'))); ?>
        <?= $form->textFieldRow($project, 'teamSize', array('style'=>'width:50px')) ?>
        <?= $form->datepickerRow($project,'deadline',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy','style'=>'width:100px'))); ?>
        <?= $form->dropDownListRow($project, 'locationId',Location::loadLocations()); ?>

        <div class="control-group">
            <div style="margin-left: 180px" class="">
                <a href="javascript:;" class="btn btn-info" id="btnNewLocation">New location</a>
                <a href="javascript:;" class="btn btn-info hide" id="btnCancel" >Cancel</a>
            </div>
        </div>
    
        <div class="locationForm hide">
            <?= $form->textFieldRow($location, 'name', array('disabled'=>true)); ?>
            <?= $form->textFieldRow($location, 'city', array('disabled'=>true)); ?>
            <?= $form->textFieldRow($location, 'country', array('disabled'=>true)); ?>
        </div>

        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Submit')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
