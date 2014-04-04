<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
/* @var $staffRole integer */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'project-edit-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>
	<div class="control-group">
            <?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->title) ?></p>
		<?php echo $form->textField($model,'title',array('class'=>'hide')); ?>
		<?php echo $form->error($model,'title'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->description) ?></p>
		<?php echo $form->textArea($model,'description',array('class'=>'hide')); ?>
		<?php echo $form->error($model,'description'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'startDate',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->startDate) ?></p>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[startDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $model->startDate,
                    'htmlOptions'=>array('class'=>'hide'),
                )); ?>
		<?php echo $form->error($model,'startDate'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'endDate',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->endDate) ?></p>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[endDate]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $model->endDate,
                    'htmlOptions'=>array('class'=>'hide'),
                )); ?>
		<?php echo $form->error($model,'endDate'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'teamSize',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->teamSize) ?></p>
		<?php echo $form->textField($model,'teamSize',array('class'=>'hide','style'=>'width:50px')); ?>
		<?php echo $form->error($model,'teamSize'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'deadline',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->deadline) ?></p>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'name'=>'Project[deadline]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'yearRange'=>'2010:2020',
                        'changeYear'=>true,
                        'dateFormat' => 'yy-mm-dd',
                    ),
                    'value' => $model->deadline,
                    'htmlOptions'=>array('class'=>'hide'),
                )); ?>
		<?php echo $form->error($model,'deadline'); ?>
            </div>
	</div>

	<div class="control-group">
            <?php echo $form->labelEx($model,'locationId',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= CHtml::encode($model->location->name) ?></p>
		<?php echo $form->dropdownList($model,'locationId',Location::loadLocations(),array('class'=>'hide')); ?>
            </div>
	</div>
        
	<div class="control-group">
            <?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
            <div class="controls">
                <p class="help-block attr-value"><?= Dictionary::item(Dictionary::TYPE_PROJECT_STATUS,$model->status) ?></p>
                <?php echo $form->dropdownList($model,'status',Dictionary::items(Dictionary::TYPE_PROJECT_STATUS),array('class'=>'hide','style'=>'width:100px')); ?>
            </div>
        </div>
    
        <?php if ($staffRole == Project::ROLE_LEADER) { ?>
            <div class="control-group project-btns">
                <div class="cell align-right pull-left">
                    <a href="javascript:;" class="btn btn-info" id="btn-edit-project">Edit</a>
                    <a href="javascript:;" class="btn btn-info hide" id="btn-update-project">Update</a>
                </div>
                <div class="cell align-left pull-left">
                    <a href="javascript:;" class="btn btn-info hide" id="btn-cancel">Cancel</a>
                </div>
            </div>
        <?php 
        }?>

<?php $this->endWidget(); ?>
