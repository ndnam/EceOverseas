<?php

/**
 * Description of ModelHelperTest
 *
 * @author Ndnam
 */
class ModelHelperTest extends CTestCase {
    
    public function testConvertDateFormat() {
        $date = '2011-4-30';
        $newDate = ModelHelper::convertDateForSave($date);
        $this->assertEquals($newDate,'30-04-2011');
    }
    
}
