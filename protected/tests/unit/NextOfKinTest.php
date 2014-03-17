<?php

class StudentTest extends CTestCase {
    
    public function testCreateNextOfKin() {
        $nextOfKin = new NextOfKin;
        $nextOfKin->fullName = "ABC";
        $nextOfKin->relationship = "Father";
        $nextOfKin->studentId = 16;
        $this->assertTrue($nextOfKin->save());
    }
    
}