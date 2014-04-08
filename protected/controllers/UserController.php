<?php

class UserController extends Controller {

    public $layout = '//layouts/profile';

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('profile', 'view'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSignUp() {
        $this->render('signup');
    }

    public function actionProfile($username,$page = 'general') {
        if ($username == Yii::app()->user->username) {
            $user = User::model()->findByPk(Yii::app()->user->id);
            if ($user->accountType == User::TYPE_STAFF) {
                $this->layout = '//layouts/column1';
                $staff = $user->staff;
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'staff-form') {
                    echo CActiveForm::validate($staff);
                    Yii::app()->end();
                }
                if (isset($_POST['Staff'])) {
                    $staff->attributes = $_POST['Staff'];
                    $staff->save();
                }
                $this->render('profile_staff', array(
                    'staff' => $staff,
                ));
            } else {
                /* @var $student Student */
                $student = UserController::loadStudent();
                switch ($page) {
                    case 'general':
                        //Ajax validation
                        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
                            echo CActiveForm::validate($student);
                            Yii::app()->end();
                        }
                        if (isset($_POST['Student'])) {
                            $student->attributes = $_POST['Student'];
                            $student->isNewRecord = false;
                            $student->save();
                        } 
//                        if ($student->created != $student->modified) { //The record has been modified
//                            $student->validate();
//                        }
                        $this->render('profile_student', array(
                            'student' => $student,
                        ));
                        break;
                    case 'medical':
                        $medicalInfo = $student->medicalInfo;
                        if (isset($_POST['ajax']) && $_POST['ajax'] === 'medical-form') {
                            echo CActiveForm::validate($medicalInfo);
                            Yii::app()->end();
                        }
                        if (isset($_POST['MedicalInfo'])) {
                            $medicalInfo->attributes = $_POST['MedicalInfo'];
                            $medicalInfo->isNewRecord = false;
                            $medicalInfo->save();
                        } 
//                        if ($medicalInfo->created != $medicalInfo->modified) { //The record has been modified
//                            $medicalInfo->validate();
//                        }
                        $this->render('profile_medical', array(
                            'medicalInfo' => $medicalInfo,
                        ));
                        break;
                    case 'cca':
                        $studentCcas = $student->studentCcas;
                        $pastTrips = $student->pastTrips;

                        if (Yii::app()->request->requestType == 'POST') {
                            if (isset($_POST['StudentCca'])) {
                                $newCcas = UserController::assignRelatedModels($_POST['StudentCca'], 'StudentCca');
                                $discardedCcas = array_diff($studentCcas, $newCcas);
                                foreach ($discardedCcas as $discardedCca) {
                                    // Delete record from database
                                    if (!$discardedCca->isNewRecord) $discardedCca->delete();
                                }
                                foreach ($newCcas as $newCca) {
                                    if ($newCca->validate()) {
                                        if (is_numeric($newCca->id)) { // If ID is integer number
                                            $newCca->isNewRecord = false;
                                        } else {
                                            $newCca->id = null;
                                        }
                                        $newCca->save(false);
                                    }
                                }
                                $student->studentCcas = $studentCcas = $newCcas;
                            } else {
                                foreach ($student->studentCcas as $discardedCca) {
                                    if (!$discardedCca->isNewRecord) $discardedCca->delete();
                                }
                                $student->studentCcas = $studentCcas = array();
                            }

                            if (isset($_POST['PastTrip'])) {
                                $newPastTrips = UserController::assignRelatedModels($_POST['PastTrip'], 'PastTrip');
                                $discardedPastTrips = array_diff($pastTrips,$newPastTrips);
                                foreach ($discardedPastTrips as $discardedPastTrip) {
                                    if (!$discardedPastTrip->isNewRecord) $discardedPastTrip->delete();
                                }
                                foreach ($newPastTrips as $newPastTrip) {
                                    if ($newPastTrip->validate()) {
                                        if (is_numeric($newPastTrip->id)) { // If ID is integer number
                                            $newPastTrip->isNewRecord = false;
                                        } else {
                                            $newPastTrip->id = null;
                                        }
                                        $newPastTrip->save(false);
                                    }
                                }
                                $student->pastTrips = $pastTrips = $newPastTrips;
                            } else {
                                foreach ($student->pastTrips as $discardedPastTrip) {
                                    if (!$discardedPastTrip->isNewRecord) $discardedPastTrip->delete();
                                }
                                $student->pastTrips = $pastTrips = array();
                            }
                        }

                        $this->render('profile_cca', array(
                            'studentCcas' => $studentCcas,
                            'pastTrips' => $pastTrips,
                        ));
                        break;
                    case 'family':
                        $nextOfKin = $student->nextOfKin;
                        $familyMembers = $student->familyMembers;
                        if (Yii::app()->request->requestType == 'POST') {
                            // Process Next Of Kin
                            if (isset($_POST['ajax']) && $_POST['ajax'] === 'family-form') {
                                echo CActiveForm::validate($nextOfKin);
                                Yii::app()->end();
                            }
                            if (isset($_POST['NextOfKin'])) {
                                $nextOfKin->attributes = $_POST['NextOfKin'];
                                $nextOfKin->isNewRecord = false;
                                $nextOfKin->save();
                            }  else {
                                $nextOfKin->refresh();
                            }
    //                        if ($nextOkKin->created != $nextOkKin->modified) { //The record has been modified
    //                            $nextOkKin->validate();
    //                        }
                            // Process Family Members
                            if (isset($_POST['FamilyMember'])) {
                                $newMembers = UserController::assignRelatedModels($_POST['FamilyMember'], 'FamilyMember');
                                $discardedMembers = array_diff($familyMembers,$newMembers);
                                foreach ($discardedMembers as $discardedMembers) {
                                    if (!$discardedMembers->isNewRecord) $discardedMembers->delete();
                                }
                                foreach ($newMembers as $newMember) {
                                    if ($newMember->validate()) {
                                        if (is_numeric($newMember->id)) { // If ID is integer number
                                            $newMember->isNewRecord = false;
                                        } else {
                                            $newMember->id = null;
                                        }
                                        $newMember->save(false);
                                    }
                                }
                                $student->familyMembers = $familyMembers = $newMembers;
                            } else {
                                foreach ($student->familyMembers as $discardedMembers) {
                                    if (!$discardedMembers->isNewRecord) $discardedMembers->delete();
                                }
                                $student->familyMembers = $familyMembers = array();
                            }
                        }

                        $this->render('profile_family',array(
                            'nextOfKin'=>$nextOfKin,
                            'familyMembers'=>$familyMembers,
                        ));
                        break;
                }
            }
            
        } else { // Access profile of another user
            $this->layout = '//layouts/column1';
            if (Yii::app()->user->accountType == User::TYPE_STAFF) { // Only allow staff to perform this action
                $user = User::model()->with('staff','student')->findByAttributes(array('username'=>$username)); // This is the user whose profile we access
                if ($user) {
                    if ($user->accountType == User::TYPE_STAFF) {
                        $staff = $user->staff;
                        // Find all the projects this staff is involved
                        $projectStaffs = ProjectStaff::model()->with('project')->findAllByAttributes(array('staffId'=>$staff->id));
                        $this->render('view_staff',array(
                            'staff'=>$staff,
                            'projectStaffs'=>$projectStaffs,
                        ));
                    } else {
                        $student = UserController::loadStudent($user->studentId);
                        $this->render('view_student',array(
                            'student'=>$student,
                        ));
                    }
                } else throw new CHttpException(404);
            } else throw new CHttpException(403);
        }
    }

    /**
     * View another user's info
     * This is not an action, just kind of an action helper
     * @param integer $id
     */
    public function viewUserProfile($username,$page='general') {
        $this->render('view');
    }

    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    public function eagerLoadStudent() {
        if (isset($_SESSION['Student'])) {
            $model = $_SESSION['Student'];
        } else 
            $model = Student::model()->with('medicalInfo','nextOfKin','studentCcas','pastTrips','familyMembers')->findByPk(Yii::app()->user->studentId);

        if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    
    public static function assignRelatedModels($items_posted, $className) {
        $models = array();
        foreach ($items_posted as $id=>$item_post) {
            $model = new $className;
            $model->attributes = $item_post;
            $model->id = $id;
            $model->studentId = Yii::app()->user->studentId;
            array_push($models, $model);
        }
        return $models;
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
    
    public static function loadStudent($id=null) {
        /* @var $student Student */
        if (isset($_SESSION['student'])) {
            $student = $_SESSION['student'];
        } else {
            if (is_null($id)) {
                $id = Yii::app()->user->studentId;
            }
            $student = Student::model()->with('medicalInfo','nextOfKin','studentCcas','pastTrips','familyMembers')->findByPk($id);
            $_SESSION['student'] = $student;
        }
        return $student;
    }
}
