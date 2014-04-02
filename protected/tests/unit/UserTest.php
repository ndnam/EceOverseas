<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StudentTest extends CTestCase {
    
    public function testCreateUser() {
        $staff = new Staff;
        $staff->attributes = array(
            'initial'=>'ndn',
            'fullName'=>'Nguyen Danh N',
            'email'=>'ndnam@ndn.com',
            'phone'=>'23456789',
        );
        $this->assertTrue($staff->save());
        $user = new User;
        $user->attributes = array(
            'username'=>'ndnndn',
            'password'=>'12345678',
            'accountType'=>1,
        );
        $user->staff = $staff;
        $this->assertTrue($user->save());
        
        // Retrieve back 
        $user = User::model()->with('staff')->findByPk($user->id);
        $this->assertFalse(is_null($user->staff));
    }
}
