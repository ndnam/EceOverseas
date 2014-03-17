<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentTest extends CTestCase {
    
    public function testCreateStudent() {
        $student = new Student;
        $student->setAttributes(array(
            'firstName' => 'Nam',
            'familyName' => 'Nguyen Danh',
            'gender' => 1,
            'studentNumber' => 'S1234',
            'school' => 'SoE',
            'course' => 'ECE',
            'level' => '1.5',
            'birthday' => '2014-03-19',
            'race' => 'Asian',
            'religion' => 'None',
            'nationality' => 'Vietnamese',
            'isPR' => '0',
            'nricNumber' => 'G1413343M',
            'passportNumber' => 'B5322433',
            'issuingCountry' => 532,
            'issuingDate' => '2014-03-03',
            'expiryDate' => '2014-03-25',
            'tshirtSize' => '3',
            'bloodGroup' => '3',
            'swimmingAbility' => '3',
            'homeAddress' => 'Kismis Ave',
            'postalCode' => '10000',
            'housingType' => '2',
            'personalEmail' => 'ndnam93@gmail.com',
            'mobilePhone' => '12345679',
            'homePhone' => '12345679',
        ));
        $this->assertTrue($student->validate());
        
        $studentCca = new StudentCca;
        $studentCca->attributes = array(
            'isInNP'=>1,
            'period'=>'2 years',
            'organization'=>'NP',
            'position'=>'leader',
            'description'=>'Description',
        );
        $this->assertTrue($studentCca->validate());
        
        $student->studentCcas = array($studentCca);
        $this->assertTrue($student->validate());
        
        $nextOfKin = new NextOfKin;
        $nextOfKin->attributes = array(
            'fullName'=>'NDT',
            'relationship'=>'Brother',
        );
        
        $student->nextOfKin = $nextOfKin;
        
        $this->assertTrue($student->save());
        
        //Read back
        $student = Student::model()->with('familyMembers','studentCcas','nextOfKin')->findByPk($student->id);
        $this->assertTrue(isset($student->nextOfKin));
        $this->assertTrue(isset($student->studentCcas));
        $this->assertEquals($student->studentCcas[0]->organization,'NP');
        $this->assertEquals($student->nextOfKin->fullName,'NDT');
    }
    
    public function testRelations() {
        $student = Student::model()->with('familyMembers','pastTrips','nextOfKin','medicalInfo')->findByPk(42);
        $this->assertTrue(isset($student->familyMembers));
        $this->assertTrue(count($student->familyMembers) > 0);
        $this->assertTrue(isset($student->pastTrips));
        $this->assertTrue(isset($student->nextOfKin));
//        $this->assertTrue(isset($student->medicalInfo));
        $this->assertEquals($student->nextOfKin->fullName,'AAA');
    }
}
