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
        $student = Student::model()->findByPk(Yii::app()->user->studentId);
        header('Content-type: application/json');
        echo CJSON::encode($student->profileErrors);
    }

    public function actionProfile($page = 'general') {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if ($user->accountType == User::TYPE_STAFF) {
            $this->render('profile_staff', array(
                'staff' => $user->staff,
            ));
        } else {
            /* @var $student Student */
            if (isset($_SESSION['student'])) {
                $student = $_SESSION['student'];
            } else {
                $student = Student::model()->with('medicalInfo','nextOfKin','studentCcas','pastTrips')->findByPk($user->studentId);
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
                    //Ajax validation
                    if (isset($_POST['ajax']) && $_POST['ajax'] === 'cca-form') {
                        echo CActiveForm::validate($studentCcas);
                        Yii::app()->end();
                    }
                    if (isset($_POST['ajax']) && $_POST['ajax'] === 'pasttrip-form') {
                        echo CActiveForm::validate($pastTrips);
                        Yii::app()->end();
                    }
                    
                    $this->render('profile_cca', array(
                        'studentCcas' => $studentCcas,
                        'pastTrips' => $pastTrips,
                    ));
                    break;
            }
        }
    }

    /**
     * View an user's info
     * @param integer $id
     */
    public function actionView($id) {
        $this->render('view');
    }

    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
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
