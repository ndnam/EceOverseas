<?php
/* @var $this UserController */
/* @var $staff Staff */

$this->breadcrumbs=array(
    'User',
    'Profile',
);
?>
<h2><center>Edit profile</center></h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'staff-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>
    
    <div class="row">
        <?php echo $form->labelEx($staff,'initial'); ?>
        <?php echo $form->textField($staff,'initial',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($staff,'initial'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($staff,'fullName'); ?>
        <?php echo $form->textField($staff,'fullName',array('size'=>30,'maxlength'=>100)); ?>
        <?php echo $form->error($staff,'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($staff,'email'); ?>
        <?php echo $form->textField($staff,'email',array('size'=>20,'maxlength'=>50)); ?>
        <?php echo $form->error($staff,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($staff,'phone'); ?>
        <?php echo $form->textField($staff,'phone',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($staff,'phone'); ?>
    </div>
    
    <div class="row buttons">
        <input type="submit" value="Save" name="btnSave" style="margin-left: 230px;">
    </div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->


