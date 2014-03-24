<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-edit-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>
        
        <input type="hidden" name="Project[id]" value="<?=$model->id?>">
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
                <p class="attr-value"><?= CHtml::encode($model->title) ?></p>
		<?php echo $form->textField($model,'title',array('class'=>'hide')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
                <p class="attr-value"><?= CHtml::encode($model->description) ?></p>
		<?php echo $form->textArea($model,'description',array('class'=>'hide')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startDate'); ?>
                <p class="attr-value"><?= CHtml::encode($model->startDate) ?></p>
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

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
                <p class="attr-value"><?= CHtml::encode($model->endDate) ?></p>
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

	<div class="row">
		<?php echo $form->labelEx($model,'teamSize'); ?>
                <p class="attr-value"><?= CHtml::encode($model->teamSize) ?></p>
		<?php echo $form->textField($model,'teamSize',array('class'=>'hide')); ?>
		<?php echo $form->error($model,'teamSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
                <p class="attr-value"><?= CHtml::encode($model->deadline) ?></p>
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

	<div class="row">
		<?php echo $form->labelEx($model,'locationId'); ?>
                <p class="attr-value"><?= CHtml::encode($model->location->name) ?></p>
		<?php echo $form->dropdownList($model,'locationId',Location::loadLocations(),array('class'=>'hide')); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
                <p class="attr-value"><?= Dictionary::item(Dictionary::TYPE_PROJECT_STATUS,$model->status) ?></p>
                <?php echo $form->dropdownList($model,'status',Dictionary::items(Dictionary::TYPE_PROJECT_STATUS),array('class'=>'hide')); ?>
        </div>
    
        <div class="row project-btns">
            <div class="cell algn-right">
                <a href="javascript:;" class="btn-edit">Edit</a>
                <a href="javascript:;" class="btn-update hide">Update</a>
            </div>
            <div class="cell algn-left">
                <a href="javascript:;" class="btn-cancel hide">Cancel</a>
            </div>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class'=>'hide')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="clearfix"></div>