<?php

class UserController extends Controller {

    public $layout = '//layouts/profile';

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('signup'),
                'users' => array('*'),
                'expression' => '$user->isGuest',
            ),
            array('allow',
                'actions' => array('profile', 'view'),
                'users' => array('@'),
            ),
            array('allow',
                    'actions'=>array('profileErrors'),
                    'users'=>array('@'),
                    'expression'=>'$user->accountType == 2',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSignUp() {
        $this->render('signup');
    }
    
    /**
     * Return list of profile sections that contain errors
     */
    public function actionProfileErrors() {
        if (isset($_SESSION['Student'])) {
            $student = $_SESSION['Student'];
        } else {
            $student = Student::model()->with('medicalInfo','studentCcas','pastTrips','nextOfKin','familyMembers')
                       ->findByPk(Yii::app()->user->studentId);
        }
        header('Content-type: application/json');
        echo CJSON::encode($student->profileErrors);
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
                if (isset($_SESSION['student'])) {
                    $student = $_SESSION['student'];
                } else {
                    $student = Student::model()->with('medicalInfo','nextOfKin','studentCcas','pastTrips','familyMembers')->findByPk($user->studentId);
    //                $student = $user->student;
                    $_SESSION['student'] = $student;
                }
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
                            $student->save(false);
                        } 
                        if ($student->created != $student->modified) { //The record has been modified
                            $student->validate();
                        }
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
                            $medicalInfo->save(false);
                        } 
                        if ($medicalInfo->created != $medicalInfo->modified) { //The record has been modified
                            $medicalInfo->validate();
                        }
                        $this->render('profile_medical', array(
                            'medicalInfo' => $medicalInfo,
                        ));
                        break;
                    case 'cca':
                        $studentCcas = $student->studentCcas;
                        $pastTrips = $student->pastTrips;

                        if (isset($_POST['StudentCca'])) {
                            $newCcas = UserController::assignRelatedModels($_POST['StudentCca'], 'StudentCca');
                            $discardedCcas = array_diff($studentCcas, $newCcas);
                            foreach ($discardedCcas as $discardedCca) {
                                $discardedCca->delete();
                            }
                            foreach ($newCcas as $newCca) {
                                $newCca->save(false);
                            }
                            $student->studentCcas = $studentCcas = $newCcas;
                        }

                        if (isset($_POST['PastTrip'])) {
                            $newPastTrips = UserController::assignRelatedModels($_POST['PastTrip'], 'PastTrip');
                            $discardedPastTrips = array_diff($pastTrips,$newPastTrips);
                            foreach ($discardedPastTrips as $discardedPastTrip) {
                                $discardedPastTrip->delete();
                            }
                            foreach ($newPastTrips as $newPastTrip) {
                                $newPastTrip->save(false);
                            }
                            $student->pastTrips = $pastTrips = $newPastTrips;
                        }

                        $this->render('profile_cca', array(
                            'studentCcas' => $studentCcas,
                            'pastTrips' => $pastTrips,
                        ));
                        break;
                    case 'family':
                        $nextOkKin = $student->nextOfKin;
                        $familyMembers = $student->familyMembers;
                        // Process Next Of Kin
                        if (isset($_POST['ajax']) && $_POST['ajax'] === 'family-form') {
                            echo CActiveForm::validate($nextOkKin);
                            Yii::app()->end();
                        }
                        if (isset($_POST['NextOfKin'])) {
                            $nextOkKin->attributes = $_POST['NextOfKin'];
                            $nextOkKin->isNewRecord = false;
                            $nextOkKin->save(false);
                        }  else {
                            $nextOkKin->refresh();
                        }
                        if ($nextOkKin->created != $nextOkKin->modified) { //The record has been modified
                            $nextOkKin->validate();
                        }
                        // Process Family Members
                        if (isset($_POST['FamilyMember'])) {
                            $newMembers = UserController::assignRelatedModels($_POST['FamilyMember'], 'FamilyMember');
                            $discardedMembers = array_diff($familyMembers,$newMembers);
                            foreach ($discardedMembers as $discardedMembers) {
                                $discardedMembers->delete();
                            }
                            foreach ($newMembers as $newMember) {
                                $newMember->save(false);
                            }
                            $student->familyMembers = $familyMembers = $newMembers;
                        }

                        $this->render('profile_family',array(
                            'nextOfKin'=>$nextOkKin,
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
                        $student = $user->student;
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
            if (is_numeric($id)) {
                $model->id = $id;
                $model->isNewRecord = false;
            }
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
}
