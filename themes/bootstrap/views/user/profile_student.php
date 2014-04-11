<?php
/* @var $this UserController */
/* @var $student Student */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Profile',
);

$errors = $student->profileErrors;
if (Yii::app()->request->requestType == 'GET') {
    $student->clearErrors();
}
?>

<fieldset>

    <legend>Student Info</legend>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'student-form',
        'type'=>'horizontal',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <div class="profile-pic-holder">
        <?= CHtml::image(Yii::app()->baseUrl.'/site/download?type=private&path='.Yii::app()->user->username.'/photo','Profile picture',array('id'=>'profile-pic','onload'=>'setProfilePicHolderHeight()'))?>
        <div class="ajax-loader hide">
            <?= CHtml::image(Yii::app()->baseUrl.'/images/ajax.gif','') ?>
        </div>
        <div class="file-upload btn <?=in_array('photo',$errors)?'':'hide'?>">
            <span>Change your photo</span>
            <input id="photo-upload" type="file" class="upload" name="Student[photo]"/>
        </div>
        <div class="warning alert-error <?=$student->hasErrors('photo')?'':'hide'?>" id="profile-pic-message"><?=$student->getError('photo')?></div>
    </div>
    
    <?= $form->textFieldRow($student, 'firstName'); ?>
    <?= $form->textFieldRow($student, 'familyName',array('maxlength'=>50)); ?>
    <?= $form->dropDownListRow($student, 'gender',array(1=>'Male',2=>'Female'), array('style'=>'width:100px')); ?>
    <?= $form->datepickerRow($student,'birthday',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy','style'=>'width:100px'))); ?>
    <?= $form->textFieldRow($student, 'studentNumber',array('maxlength'=>10, 'style'=>'width:100px')); ?>
    <?= $form->textFieldRow($student, 'school',array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($student, 'course',array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($student, 'level',array('maxlength'=>10)); ?>
    <?= $form->textFieldRow($student, 'race',array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($student, 'religion',array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($student, 'nationality',array('maxlength'=>50)); ?>
    <?= $form->checkBoxRow($student, 'isPR'); ?>
    <?= $form->textFieldRow($student, 'nricNumber',array('maxlength'=>10, 'style'=>'width:100px')); ?>
    <?= $form->textFieldRow($student, 'passportNumber',array('maxlength'=>50, 'style'=>'width:100px')); ?>
    <?= $form->dropDownListRow($student, 'issuingCountry',DictCountry::getCountries()); ?>
    <?= $form->datepickerRow($student,'issuingDate',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy', 'style'=>'width:100px'))); ?>
    <?= $form->datepickerRow($student,'expiryDate',array('options' => array('format'=>'dd/mm/yyyy'), 'htmlOptions'=>array('placeholder'=>'dd/mm/yyyy', 'style'=>'width:100px'))); ?>
    <div class="control-group">
        <label for="Student_passport" class="control-label">Passport photo <span class="required">*</span></label>
        <div class="controls" style="position: relative">
            <div class="file-upload btn">
                <span>Choose photo</span>
                <?= $form->fileField($student,'passport',array('class'=>'upload','id'=>'passport-upload')) ?>
            </div>
            <?= CHtml::image(Yii::app()->baseUrl.'/site/download?type=private&path='.Yii::app()->user->username.'/passport','',array('id'=>'passport-img'))?>
            <?= $form->error($student,'passport')?>
        </div>
    </div>
    <?= $form->dropDownListRow($student, 'tshirtSize',Dictionary::items(Dictionary::TYPE_TSHIRT_SIZE), array('style'=>'width:100px')); ?>
    <?= $form->dropDownListRow($student, 'bloodGroup',Dictionary::items(Dictionary::TYPE_BLOOD_GROUP), array('style'=>'width:100px')); ?>
    <?= $form->dropDownListRow($student, 'swimmingAbility',Dictionary::items(Dictionary::TYPE_SWIMMING_ABILITY), array('style'=>'width:100px')); ?>
    <?= $form->textAreaRow($student, 'homeAddress',array('maxlength'=>200)); ?>
    <?= $form->textFieldRow($student, 'postalCode',array('maxlength'=>10)); ?>
    <?= $form->dropDownListRow($student, 'housingType',Dictionary::items(Dictionary::TYPE_HOUSING), array('style'=>'width:100px')); ?>
    <?= $form->textFieldRow($student, 'personalEmail',array('maxlength'=>50)); ?>
    <?= $form->textFieldRow($student, 'mobilePhone',array('maxlength'=>20)); ?>
    <?= $form->textFieldRow($student, 'homePhone',array('maxlength'=>20)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>
    </div>
    
    <?php $this->endWidget(); ?>

</fieldset>

<script>
$(document).ready(function(){
    setProfilePicHolderHeight();
    $('#photo-upload').change(function(){
        var id = $(this).attr('id');
        var file = $(this)[0].files[0];
        var imageRegex = /image.*/;
        var picture = document.getElementById('profile-pic');
        if (!file.type.match(imageRegex)) {
            js:bootbox.alert('File type invalid. You must upload an image file.');
            picture.src = '/EceOverseas/site/download?type=private&path=ndn/photo';
            return;
        }
        if (file.size > 10485760) {
            js:bootbox.alert('File too large. File size must be less than 10MB.');
            picture.src = '/EceOverseas/site/download?type=private&path=ndn/photo';
            return;
        }
        // Display the selected 
        picture.onload = function(){
            setProfilePicHolderHeight();
            // Hide the change photo button & message
            $('.profile-pic-holder .file-upload').addClass('hide');
            $('#profile-pic-message').hide();
        };
        var url = window.URL.createObjectURL(file);
        picture.src= url;
    });
    $('#passport-upload').change(function(){
        var id = $(this).attr('id');
        var file = $(this)[0].files[0];
        var imageRegex = /image.*/;
        var picture = document.getElementById('passport-img');
        if (!file.type.match(imageRegex)) {
            js:bootbox.alert('File type invalid. You must upload an image file.');
            picture.src = '/EceOverseas/site/download?type=private&path=ndn/passport';
            return;
        }
        if (file.size > 10485760) {
            js:bootbox.alert('File too large. File size must be less than 10MB.');
            picture.src = '/EceOverseas/site/download?type=private&path=ndn/passport';
            return;
        }
        // Hide error message
        $('#Student_passport_em_').hide();
        // Display the selected img
        var url = window.URL.createObjectURL(file);
        picture.src= url;
    });
});

function flashMessage(message) {
    $('#profile-pic-message').html(message).show();
//    setTimeout(function(){
//        $('#profile-pic-message').html('You need to upload a picture of yourself.');
//    },5000);
}
</script>