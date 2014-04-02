<?php

class StudentTest extends CDbTestCase {
    
    public $fixtures = array(
        'students'=>'Student',
        'studentApplications'=>'StudentApplication',
        'projects'=>'Project',
    );
    
    public function testManyManyRelation() {
        $student = $this->students('student1');
        $studentApp = new StudentApplication;
        $studentApp->studentId = 1;
        $studentApp->projectId = 1;
        $studentApp->support = 'I am super good';
        $this->assertTrue($studentApp->save());
        $this->assertTrue(count(StudentApplication::model()->findAll()) > 0);
        $student = Student::model()->with('projects')->findByPk(1);
        $this->assertTrue(count($student->projects) > 0);
    }
    
    public function testCustomValidation() {
        $project = new Project;
        $project->title = 'Sample project';
        $project->description = 'This is a sample project';
        $project->startDate = '2014-3-20';
        $project->endDate = '2014-3-24';
        $project->teamSize =  13;
        $project->deadline = '2014-3-19';
        $project->locationId = 1;
        
        $this->assertTrue($project->validate());
        $project->startDate = '2014-3-25';
        $this->assertFalse($project->validate());
        $project->startDate = '2014-3-20';
        $project->deadline = '2014-3-22';
        $this->assertFalse($project->validate());
    }
    
}

