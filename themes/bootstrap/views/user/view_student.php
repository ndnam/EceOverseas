<?php
/* @var $this UserController */
/* @var $student Student */

?>
<style>
.detail-view th {
    width: 240px;
}
fieldset {
    margin-bottom: 30px;
}
.grid-view {
    padding-top: 0;
}
</style>

<h2><center><?=$student->fullname?>'s Profile</center></h2>

<fieldset>

    <legend>Student Info</legend>
    
    <?php 
    $data = $student->attributes;
    $data['issuingCountry'] = DictCountry::getCountry($data['issuingCountry']);
    $data['isPR'] = $data['isPR'] ? 'Yes' : 'No';
    $data['gender'] = $data['gender'] == 1 ? 'Male' : 'Female';
    $data['tshirtSize'] = Dictionary::item(Dictionary::TYPE_TSHIRT_SIZE, $data['tshirtSize']);
    $data['swimmingAbility'] = Dictionary::item(Dictionary::TYPE_SWIMMING_ABILITY, $data['swimmingAbility']);
    $data['housingType'] = Dictionary::item(Dictionary::TYPE_HOUSING, $data['housingType']);
    $data['bloodGroup'] = Dictionary::item(Dictionary::TYPE_BLOOD_GROUP, $data['bloodGroup']);
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>$data,
        'attributes'=>array(
            array('name'=>'firstName', 'label'=>'First name'),
            array('name'=>'familyName', 'label'=>'Family name'),
            array('name'=>'gender', 'label'=>'Gender'),
            array('name'=>'studentNumber', 'label'=>'Student Number'),
            array('name'=>'school', 'label'=>'School'),
            array('name'=>'course', 'label'=>'Course'),
            array('name'=>'level', 'label'=>'Level'),
            array('name'=>'birthday', 'label'=>'Birthday'),
            array('name'=>'race', 'label'=>'Race'),
            array('name'=>'religion', 'label'=>'Religion'),
            array('name'=>'nationality', 'label'=>'Nationality'),
            array('name'=>'isPR', 'label'=>'Is PR'),
            array('name'=>'nricNumber', 'label'=>'NRIC Number'),
            array('name'=>'passportNumber', 'label'=>'Passport Number'),
            array('name'=>'issuingCountry', 'label'=>'Issuing Country'),
            array('name'=>'issuingDate', 'label'=>'Issuing Date'),
            array('name'=>'expiryDate', 'label'=>'Expiry Date'),
            array('name'=>'bloodGroup', 'label'=>'Blood Group'),
            array('name'=>'swimmingAbility', 'label'=>'Swimming Ability'),
            array('name'=>'homeAddress', 'label'=>'Home Address'),
            array('name'=>'postalCode', 'label'=>'Postal Code'),
            array('name'=>'housingType', 'label'=>'Housing Type'),
            array('name'=>'personalEmail', 'label'=>'Personal Email'),
            array('name'=>'mobilePhone', 'label'=>'Mobile Phone'),
            array('name'=>'homePhone', 'label'=>'Home Phone'),
    ))); 
    ?>
    
</fieldset>

<?php 
$medicalInfo = $student->medicalInfo;

$medHistoryAttrs = array('heartProblem','fits','faintingSpell','diabetes','asthma','migraine','visionProblem',
    'colorBlind','earProblem','fractures','dislocations','carrierStatus');
$medHistoryStr = '';

$foodResAttrs = array('vegetarian','halal','noSeafood','noBeef');
$foodResStr = '';

foreach ($medicalInfo->attributes as $name=>$value) {
    // Create medical history list string
    if (in_array($name, $medHistoryAttrs) && $value == 1) {
        $medHistoryStr .= $medicalInfo->getAttributeLabel($name) . ', ';
    }
    // Create food restriction list string
    if (in_array($name, $foodResAttrs) && $value == 1) {
        $foodResStr .= $medicalInfo->getAttributeLabel($name) . ', ';
    }
}

$medHistoryStr = substr($medHistoryStr, 0, strlen($medHistoryStr)-2);
$foodResStr = substr($foodResStr, 0, strlen($foodResStr)-2);

$data = $medicalInfo->attributes;
$data['medicalHistory'] = $medHistoryStr;
$data['foodRestrictions'] = $foodResStr;
?>

<fieldset>

    <legend>Medical Information</legend>
    
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', 
        array(
            'data' => $data,
            'attributes' => array(
                array('name' => 'medicalHistory', 'label' => 'Medical History'),
                array('name' => 'otherMedicalHistory', 'label' => 'Other Medical History'),
                array('name' => 'currentMedications', 'label' => 'Current Medications'),
                array('name' => 'otherMedicalConditions', 'label' => 'Other Medical Conditions'),
                array('name' => 'physicalDisabilities', 'label' => 'Physical Disabilities'),
                array('name' => 'allergies', 'label' => 'Allergies'),
                array('name' => 'foodRestrictions', 'label' => 'Food Restrictions'),
                array('name' => 'otherFoodRestrictions', 'label' => 'Other Food Restrictions'),
    )));
    ?>
    
</fieldset>

<?php
// Create grid view data provider
$data = array();
foreach ($student->studentCcas as $cca) {
    $attrs = $cca->attributes;
    $attrs['isInNP'] = $attrs['isInNP'] ? 'Yes' : 'No';
    array_push($data, $attrs);
}
$gridDataProvider = new CArrayDataProvider($data);
?>

<fieldset>

    <legend>Co-curriculum Activities</legend>
    
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$gridDataProvider,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'isInNP', 'header'=>'Is in NP'),
            array('name'=>'period', 'header'=>'Period'),
            array('name'=>'organization', 'header'=>'Organization'),
            array('name'=>'position', 'header'=>'Position'),
            array('name'=>'description', 'header'=>'Description'),
    ))); ?>

</fieldset>

<?php
// Create grid view data provider
$data = array();
foreach ($student->pastTrips as $pasttrip) {
    $attrs = $pasttrip->attributes;
    $attrs['isSubsidized'] = $attrs['isSubsidized'] ? 'Yes' : 'No';
    array_push($data, $attrs);
}
$gridDataProvider = new CArrayDataProvider($data);
?>

<fieldset>

    <legend>Past Trips</legend>
    
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$gridDataProvider,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'programName', 'header'=>'Program Name'),
            array('name'=>'country', 'header'=>'Country'),
            array('name'=>'duration', 'header'=>'Duration'),
            array('name'=>'capacity', 'header'=>'Capacity'),
            array('name'=>'isSubsidized', 'header'=>'Is Subsidized'),
            array('name'=>'amount', 'header'=>'Amount'),
    ))); ?>

</fieldset>

<fieldset>

    <legend>Next Of Kin</legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', 
        array(
            'data' => $student->nextOfKin->attributes,
            'attributes' => array(
                array('name' => 'fullName', 'label' => 'Full Name'),
                array('name' => 'relationship', 'label' => 'Relationship'),
                array('name' => 'mobilePhone', 'label' => 'Mobile Phone'),
                array('name' => 'officePhone', 'label' => 'Office Phone'),
                array('name' => 'homePhone', 'label' => 'Home Phone'),
                array('name' => 'email', 'label' => 'Email'),
            ),
    ));
    ?>

</fieldset>

<?php
// Create grid view data provider
$data = array();
foreach ($student->familyMembers as $familyMember) {
    array_push($data, $familyMember->attributes);
}
$gridDataProvider = new CArrayDataProvider($data);
?>

<fieldset>

    <legend>Family Members</legend>

    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped condensed',
        'dataProvider'=>$gridDataProvider,
        'template'=>"{items}",
        'columns'=>array(
            array('name'=>'fullname', 'header'=>'Full Name'),
            array('name'=>'age', 'header'=>'Age'),
            array('name'=>'occupation', 'header'=>'Occupation'),
            array('name'=>'monthlyIncome', 'header'=>'Monthly Income'),
    )));?>
    
</fieldset>