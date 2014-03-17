<?php
/* @var $this StudentController */
/* @var $studentCca Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$studentCca->id,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$studentCca->id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$studentCca->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>View Student #<?php echo $studentCca->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$studentCca,
	'attributes'=>array(
		'id',
		'fullName',
		'familyName',
		'gender',
		'studentNumber',
		'school',
		'course',
		'level',
		'birthday',
		'race',
		'religion',
		'nationality',
		'isPR',
		'nricNumber',
		'passportNumber',
		'issuingCountry',
		'issuingDate',
		'expiryDate',
		'tshirtSize',
		'bloodGroup',
		'swimmingAbility',
		'homeAddress',
		'postalCode',
		'housingType',
		'personalEmail',
		'mobilePhone',
		'homePhone',
		'created',
		'modified',
	),
)); ?>
