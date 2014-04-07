<?php
/* @var $this UserController */
/* @var $staff Staff */

$this->breadcrumbs=array(
    'Profile',
);
?>
<h2><center>Edit profile</center></h2>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'staff-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>
    
    <?= $form->textFieldRow($staff, 'initial', array('maxlength'=>10)); ?>
    <?= $form->textFieldRow($staff, 'fullName', array('maxlength'=>100)); ?>
    <?= $form->textFieldRow($staff, 'email', array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($staff, 'phone', array('maxlength'=>20)); ?>
    
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
    </div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->


