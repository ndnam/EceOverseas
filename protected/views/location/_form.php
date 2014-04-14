<?php
/* @var $this LocationController */
/* @var $model Location */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'location-form',
        'type'=>'horizontal',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>

        <?= $form->textFieldRow($model, 'name',array('maxlength'=>100)); ?>
        <?= $form->textFieldRow($model, 'city',array('maxlength'=>50)); ?>
        <?= $form->textFieldRow($model, 'country',array('maxlength'=>50)); ?>

        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Submit')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->