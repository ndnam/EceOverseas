<?php

class StudentController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/student';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('closeSession'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('deleteApp', 'apply', 'closeSession', 'publicProjects', 'applications'),
                'users' => array('@'),
                'expression' => '$user->accountType == 2',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * View a project
     * @param integer $id
     */
    public function actionProject($id) {
        
    }

    public function actionCloseSession() {
        Yii::app()->session->destroy();
    }

    /**
     * 
     * @param int $step
     */
    public function actionApplyOld($step = 1) {
        $firephp = FirePHP::getInstance(true);

        if (isset($_SESSION['Student']) && ($student = $_SESSION['Student']) instanceof Student) {
            $student = $_SESSION['Student'];
        }
        switch ($step) {
            case 1:
                if (empty($student)) {
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
                        'nricNumber' => 'G1451343M',
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
                }

                if (isset($_POST['Student'])) {
                    $student->attributes = $_POST['Student'];
                    if ($student->validate()) {
                        $_SESSION['Student'] = $student;
                        $this->redirect(array('apply', 'step' => isset($_POST['btnBack']) ? $step - 1 : $step + 1));
                    }
                }

                $this->render('apply', array(
                    'student' => $student,
                    'step' => 1,
                ));
                break;

            case 2:
                if (isset($student)) {
                    if (is_null($student->medicalInfo))
                        $student->medicalInfo = new MedicalInfo;
                    if (isset($_POST['MedicalInfo'])) {
                        $student->medicalInfo->attributes = $_POST['MedicalInfo'];
                        if ($student->medicalInfo->validate()) {
                            $this->redirect(array('apply', 'step' => isset($_POST['btnBack']) ? $step - 1 : $step + 1));
                        }
                    }

                    $this->render('apply', array(
                        'medicalInfo' => $student->medicalInfo,
                        'step' => 2,
                    ));
                } else
                    $this->redirect(array('apply', 'step' => 1));
                break;

            case 3:
                if (isset($student)) {

                    // Check if this is a postback
                    if (Yii::app()->request->isPostRequest) {
                        if (empty($_POST['noCCA'])) {
                            if (isset($_POST['StudentCca'])) {
                                $student->studentCcas = StudentController::assignRelatedModels($_POST['StudentCca'], 'StudentCca');
                            }
                            $_SESSION['noCCA'] = 0;
                        } else {
                            $student->studentCcas = null;
                            $_SESSION['noCCA'] = 1;
                        }

                        if (isset($_POST['havePastTrip'])) {
                            if (isset($_POST['PastTrip'])) {
                                $student->pastTrips = StudentController::assignRelatedModels($_POST['PastTrip'], 'PastTrip');
                            }
                        } else
                            $student->pastTrips = null;

                        if ($student->validateRelated('studentCcas') * $student->validateRelated('pastTrips')) {
                            $this->redirect(array('apply', 'step' => isset($_POST['btnBack']) ? $step - 1 : $step + 1));
                        }
                    }

                    $this->render('apply', array(
                        'studentCcas' => $student->studentCcas,
                        'pastTrips' => $student->pastTrips,
                        'noCCA' => isset($_SESSION['noCCA']) ? $_SESSION['noCCA'] : 0,
                        'step' => 3,
                    ));
                } else
                    $this->redirect(array('apply', 'step' => 1));
                break;

            case 4:
                if (isset($student)) {
                    $firephp->log($student->nextOfKin);
                    if (is_null($student->nextOfKin))
                        $student->nextOfKin = new NextOfKin;
                    // Check if this is a postback
                    if (Yii::app()->request->isPostRequest) {
                        if (isset($_POST['NextOfKin'])) {
                            $student->nextOfKin->attributes = $_POST['NextOfKin'];
                        }
                        if (isset($_POST['FamilyMember'])) {
                            if (count($_POST['FamilyMember']) > 8) {
                                $student->addError('familyMemebers', 'You can only enter 8 family members');
                            } else
                                $student->familyMembers = StudentController::assignRelatedModels($_POST['FamilyMember'], 'FamilyMember');
                        } else
                            $student->addError('familyMemebers', 'You need to enter at least 1 family member');

                        if ($student->nextOfKin->validate() * $student->validateRelated('familyMembers')) {
                            $this->redirect(array('apply', 'step' => isset($_POST['btnBack']) ? $step - 1 : $step + 1));
                        }
                    }

                    $this->render('apply', array(
                        'student' => $student,
                        'nextOfKin' => $student->nextOfKin,
                        'familyMembers' => $student->familyMembers,
                        'step' => 4,
                    ));
                } else
                    $this->redirect(array('apply', 'step' => 1));
                break;

            case 5:
                if (isset($student)) {
                    $projects = Project::model()->findAll();
                    // Check if this is a postback
                    if (Yii::app()->request->isPostRequest) {
                        if (isset($_POST['projectId'])) {
                            $student->projects = Project::model()->findAllByPk($_POST['projectId']);
                            if (isset($_POST['Project'])) {
                                // Save the isPR and supportStatement to SESSION
                                $_SESSION['Project'] = $_POST['Project'];
                            }
                            $this->redirect(array('apply', 'step' => isset($_POST['btnBack']) ? $step - 1 : $step + 1));
                        } else
                            $student->projects = array();
                    }

                    $selectedProjects = array();
                    if (count($student->projects > 0)) {
                        foreach ($student->projects as $project) {
                            array_push($selectedProjects, $project->id);
                        }
                    }
                    $this->render('apply', array(
                        'selectedProjects' => $selectedProjects,
                        'projects' => $projects,
                        'step' => 5,
                    ));
                } else
                    $this->redirect(array('apply', 'step' => 1));
                break;

            case 6:
                $firephp->log($_SESSION['Project']);
                if (isset($student)) {
                    // Check if this is a postback
                    if (Yii::app()->request->isPostRequest) {
                        if (isset($_POST['btnBack'])) {
                            $this->redirect(array('apply', 'step' => 5));
                        }
                        if (isset($_POST['save'])) {
                            if ($isOK = $student->save()) {
                                if (isset($_SESSION['Project']) && is_array($_SESSION['Project'])) {
                                    // Retrieve the student applications just entered to database
                                    $studentApps = StudentApplication::model()->findAllByAttributes(array('studentId' => $student->id));
                                    foreach ($studentApps as $studentApp) {
                                        if (isset($_SESSION['Project'][$studentApp->projectId]) && is_array($_SESSION['Project'][$studentApp->projectId])) {
                                            // Insert isPR and support statments to studentapplication records
                                            foreach ($_SESSION['Project'][$studentApp->projectId] as $attr => $value) {
                                                $studentApp->$attr = $value;
                                            }
                                            $isOK = $isOK && $studentApp->save();
                                        }
                                    }
                                }
                            }
                            if ($isOK) {
                                echo 'Your application has been submitted';
                                unset($_SESSION['Student'], $_SESSION['Project']);
                            } else {
                                echo "Some error occured. Your application cannot be saved to database";
                            }
                            Yii::app()->end();
                        }
                    }

                    $this->render('apply', array(
                        'student' => $student,
                        'step' => 6,
                    ));
                } else
                    $this->redirect(array('apply', 'step' => 1));
                break;
        }
    }
    
    /**
     * Create or Edit StudentApplications
     * @param integer $id - Project Id
     */
    public function actionApply($id) {
        $project = Project::model()->findByPk($id);
        $application = StudentApplication::model()->findByAttributes(array('projectId'=>$id,'studentId'=>Yii::app()->user->studentId));
        if (is_null($application)) {
            $application = new StudentApplication;
            $application->projectId = $id;
            $application->studentId = Yii::app()->user->studentId;
        }
        
        if (isset($_POST['StudentApplication'])) {
            $application->attributes = $_POST['StudentApplication'];
            $application->save();
            $this->redirect(array('student/applications'));
        }
        
        $this->render('apply',array(
            'project'=>$project,
            'application'=>$application,
        ));
    }

    /**
     * 
     * @param Object $items_posted
     * @param string $className
     */
    public static function assignRelatedModels($items_posted, $className) {
        $models = array();
        foreach ($items_posted as $item_post) {
            $model = new $className;
            $model->attributes = $item_post;
            array_push($models, $model);
        }
        return $models;
    }

    /**
     * Lists all public projects that student hasn't applied
     */
    public function actionPublicProjects() {
        $publicProjects = Project::model()->findAll('status=' . Project::STATUS_PUBLIC);
        $appliedProjects = Project::getProjectByStudentId(Yii::app()->user->studentId);
        $unappliedProjects = array_diff($publicProjects, $appliedProjects);
        $this->render('public_projects', array(
            'projects' => $unappliedProjects,
        ));
    }

    /**
     * Lists all projects that student has applied
     */
    public function actionApplications() {
        $applications = StudentApplication::model()->findAllByAttributes(array('studentId'=>Yii::app()->user->studentId));
        $this->render('applications', array(
            'applications' => $applications,
        ));
    }
    
    /**
     * Delete a student application
     * @param integer $id
     */
    public function actionDeleteApp($id) {
        StudentApplication::model()->deleteByPk($id);
        $this->redirect(array('student/appliedProjects'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Student the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Student::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Student $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
