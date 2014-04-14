<?php

/**
 * Description of ControllHelper
 *
 * @author Ndnam
 */
class ControllerHelper {
    
    /**
     * Convert an array of objects to dropdown-list-compatible array
     * @param array $inpput - The input array
     * @param string $index - Name of the index field
     * @param string $value - Name of the value field
     */
    public static function toDropdownListArray($input,$index,$value) {
        $array = array();
        foreach ($input as $item) {
            $array[$item->$index] = $item->$value;
        }
        return $array;
    }
        
    public static function returnSuccess() {
        header('Content-type: application/json');
        echo CJSON::encode(array(
            'status'=>1,
        ));
        Yii::app()->end();
    }

    /**
     * Return a JSON encoded error message
     * @param string $message
     */
    public static function returnError($message) {
        header('Content-type: application/json');
        echo CJSON::encode(array(
            'status'=>0,
            'message'=>$message ? $message : 'Some error occured. Unable to complete request.',
        ));
        Yii::app()->end();
    }
    
    /**
     * if ($id == null) get student and set to Session
     * else: just get student
     * @param integer $id
     * @return Student
     */
    public static function loadStudent($id=null) {
        /* @var $student Student */
        $student = null;
        if ($id) {
            unset($_SESSION['student']);
            $setSession = false;
        } else {
            $setSession = true;
            $id = Yii::app()->user->studentId;
            if (isset($_SESSION['student'])) {
                $student = $_SESSION['student'];
            }
        }
        if (is_null($student))
            $student = Student::model()->with('medicalInfo','nextOfKin','studentCcas','pastTrips','familyMembers','user')->findByPk($id);
        if ($setSession)
            $_SESSION['student'] = $student;
        return $student;
    }
}
