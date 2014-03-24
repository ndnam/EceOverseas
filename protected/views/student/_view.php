<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstName')); ?>:</b>
	<?php echo CHtml::encode($data->firstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('familyName')); ?>:</b>
	<?php echo CHtml::encode($data->familyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentNumber')); ?>:</b>
	<?php echo CHtml::encode($data->studentNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($data->school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('race')); ?>:</b>
	<?php echo CHtml::encode($data->race); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isPR')); ?>:</b>
	<?php echo CHtml::encode($data->isPR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nricNumber')); ?>:</b>
	<?php echo CHtml::encode($data->nricNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passportNumber')); ?>:</b>
	<?php echo CHtml::encode($data->passportNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuingCountry')); ?>:</b>
	<?php echo CHtml::encode($data->issuingCountry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuingDate')); ?>:</b>
	<?php echo CHtml::encode($data->issuingDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expiryDate')); ?>:</b>
	<?php echo CHtml::encode($data->expiryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tshirtSize')); ?>:</b>
	<?php echo CHtml::encode($data->tshirtSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bloodGroup')); ?>:</b>
	<?php echo CHtml::encode($data->bloodGroup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swimmingAbility')); ?>:</b>
	<?php echo CHtml::encode($data->swimmingAbility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homeAddress')); ?>:</b>
	<?php echo CHtml::encode($data->homeAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postalCode')); ?>:</b>
	<?php echo CHtml::encode($data->postalCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('housingType')); ?>:</b>
	<?php echo CHtml::encode($data->housingType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personalEmail')); ?>:</b>
	<?php echo CHtml::encode($data->personalEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobilePhone')); ?>:</b>
	<?php echo CHtml::encode($data->mobilePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homePhone')); ?>:</b>
	<?php echo CHtml::encode($data->homePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>