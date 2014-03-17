<?php
/* @var $this StudentController */
/* @var $step int */
/* @var $student Student */
/* @var $medicalInfo MedicalInfo */
/* @var $studentCcas array */
/* @var $pastTrips array */
/* @var $nextOfKin NextOfKin */
/* @var $familyMembers array */
/* @var $selectedProjects array */

$this->breadcrumbs=array(
	'Student'=>array('index'),
	'Application',
);
?>


<?php 
    switch ($step) {
        case 1:
            $this->renderPartial('_apply_form1', array('student'=>$student)); 
            break;
        case 2:
            $this->renderPartial('_apply_form2', array('medicalInfo'=>$medicalInfo)); 
            break;
        case 3:
            $this->renderPartial('_apply_form3', array(
                'studentCcas'=>$studentCcas,
                'pastTrips'=>$pastTrips,
                'noCCA'=>$noCCA,
            )); 
            break;
        case 4:
            $this->renderPartial('_apply_form4', array(
                'student'=>$student,
                'nextOfKin'=>$nextOfKin,
                'familyMembers'=>$familyMembers,
            ));
            break;
        case 5:
            $this->renderPartial('_apply_form5', array(
                'selectedProjects'=>$selectedProjects,
                'projects'=>$projects,
            ));
            break;
        case 6:
            $this->renderPartial('_apply_form6', array(
                'student'=>$student,
            ));
            break;
    }
?>