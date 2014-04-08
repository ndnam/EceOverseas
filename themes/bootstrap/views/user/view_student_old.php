<?php
function printTextAttr($model,$attr) {
    return '<div class="control-group">
        <label class="control-label">'.$model->getAttributeLabel($attr).'</label>
        <div class="controls">
            <p class="help-block">'.CHtml::encode($model->$attr).'</p>
        </div>
    </div>';
}

function printDropdownAttr($model,$attr,$type) {
    return '<div class="control-group">
        <label class="control-label">'.$model->getAttributeLabel($attr).'</label>
        <div class="controls">
            <p class="help-block">'.Dictionary::item($type, $model->$attr).'</p>
        </div>
    </div>';
}
?>

    <form class="form-horizontal">

        <?= printTextAttr($student, 'firstName')?>
        <?= printTextAttr($student, 'familyName')?>
        <div class="control-group">
            <label class="control-label">Gender</label>
            <div class="controls">
                <p class="help-block"><?= $student->gender==1?'Male':'Female'?></p>
            </div>
        </div>
        <?= printTextAttr($student, 'birthday')?>
        <?= printTextAttr($student, 'studentNumber')?>
        <?= printTextAttr($student, 'school')?>
        <?= printTextAttr($student, 'course')?>
        <?= printTextAttr($student, 'level')?>
        <?= printTextAttr($student, 'race')?>
        <?= printTextAttr($student, 'religion')?>
        <?= printTextAttr($student, 'nationality')?>
        <div class="control-group">
            <label class="control-label">Is PR</label>
            <div class="controls">
                <p class="help-block"><?= $student->isPR?'Yes':'No'?></p>
            </div>
        </div>
        <?= printTextAttr($student, 'nricNumber')?>
        <?= printTextAttr($student, 'passportNumber')?>
        <div class="control-group">
            <label class="control-label">Issuing country</label>
            <div class="controls">
                <p class="help-block"><?= DictCountry::getCountry($student->issuingCountry)?></p>
            </div>
        </div>
        <?= printTextAttr($student, 'issuingDate')?>
        <?= printTextAttr($student, 'expiryDate')?>
        <?= printDropdownAttr($student, 'tshirtSize', Dictionary::TYPE_TSHIRT_SIZE)?>
        <?= printDropdownAttr($student, 'bloodGroup', Dictionary::TYPE_BLOOD_GROUP)?>
        <?= printDropdownAttr($student, 'swimmingAbility', Dictionary::TYPE_SWIMMING_ABILITY)?>
        <?= printTextAttr($student, 'homeAddress')?>
        <?= printTextAttr($student, 'postalCode')?>
        <?= printDropdownAttr($student, 'housingType', Dictionary::TYPE_HOUSING)?>
        <?= printTextAttr($student, 'personalEmail')?>
        <?= printTextAttr($student, 'mobilePhone')?>
        <?= printTextAttr($student, 'homePhone')?>
        
    </form>