<?php

class ProjectController extends Controller
{
	public $layout='//layouts/column2';
        
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            return array(
                array('allow',  
                    'actions'=>array('test','view'),
                    'users'=>array('@'),
                ),
                array('allow',
                    'actions'=>array('index','create','update','delete','changeApplicationStatus','changeStaffRole','addStaff','removeStaff','availableStaffs'),
                    'users'=>array('@'),
                    'expression'=>'$user->accountType == 1',
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
	}

        /**
         * List all Projects
         */
        public function actionIndex() {
            $projects = Project::model()->findAll(array('order'=>'modified DESC'));
            
            if (Yii::app()->user->accountType == 1) {
                $relatedProjects = array();
                foreach ($projects as $project) {
                    if ($project->getStaffRole(Yii::app()->user->staffId)) {
                        array_push($relatedProjects, $project);
                    }
                }
                $otherProjects = array_diff($projects, $relatedProjects);
                
                $this->render('index',array(
                    'relatedProjects'=>$relatedProjects,
                    'otherProjects'=>$otherProjects,
                ));
            }
        }
        
        public function actionApplication() {
            
        }
        
        /**
         * 
         * @param integer $id
         */
        public function actionView($id) {
            $model = $this->loadModel($id);
            
            if (Yii::app()->user->accountType == User::TYPE_STAFF) {
                $role = $model->getStaffRole(Yii::app()->user->staffId);

                // Update Project via Ajax
                if (isset($_POST['Project'])) {
                    $model->attributes = $_POST['Project'];
                    $model->status = $_POST['Project']['status'];
                    //Ajax validation
                    if(isset($_POST['ajax']) && $_POST['ajax']==='project-edit-form'){
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                    }
                    //Save model
                    if ($model->save()) {
                        $status = 1;
                    } else {
                        $status = 0;
                    }
                    echo CJavaScript::jsonEncode(array(
                        'status'=>$status,
                        'model'=>$model->attributes,
                    ));
                    Yii::app()->end();
                }

                $appDataProvider = new CActiveDataProvider('StudentApplication',array(
                    'criteria'=>array(
                        'condition'=>'projectId = ' . $id,
                        'order'=>'status DESC',
                        'with'=>array('student'),
                    ),
                ));

                $staffDataProvider = new CActiveDataProvider('ProjectStaff',array(
                    'criteria'=>array(
                        'condition'=>'projectId = ' . $id,
                        'with'=>array('staff'),
                        'order'=>'fullname',
                    ),
                ));

                $this->render('view_edit',array(
                    'model'=>$model,
                    'staffRole'=>$role,
                    'applications'=>$appDataProvider->getData(),
                    'staffs'=>$staffDataProvider->getData(),
                ));
            } else {
                $this->render('view',array(
                    'project'=>$model,
                ));
            }
        }
        
	public function actionChangeStaffRole()
	{
	    if (!(isset($_POST['projectStaffId']) && isset($_POST['role']))) {
                $this->returnError('Invalid request');
            }
            
            $projectStaffId = $_POST['projectStaffId'];
            $role = $_POST['role'];

            if (!in_array($role,[1,2,3,4,5])) {
                $this->returnError('Invalid role value');
            }

            $projectStaff = ProjectStaff::model()->findByPk($projectStaffId);
            if ($projectStaff) {
                // Get the current Project's model
                $project = $this->loadModel($projectStaff->projectId);
                // Authorize the current user
                if ($project->getStaffRole(Yii::app()->user->staffId) == Project::ROLE_LEADER) {
                    // If the current staff is the only leader of the project
                    if (ProjectStaff::leaderCount($projectStaff->projectId) == 1) {
                        $this->returnError('You cannot change you role. A project needs at least one leader.');
                    }
                    $projectStaff->role = $role;
                    if ($projectStaff->save()) {
                        // If staff is changing his own role, refresh the page
                        if ($projectStaff->staffId == Yii::app()->user->staffId) {
                            header('Content-type: application/json');
                            echo CJSON::encode(array(
                                'status'=>1,
                                'refresh'=>1,
                            ));
                            Yii::app()->end();
                        }
                        $this->returnSuccess();
                    } else {
                        $this->returnError('Some error prevents staff from being changed');
                    }
                } else {
                    $this->returnError('You don\'t have permission to perform this task');
                }
            } else {
                $this->returnError('Record not found');
            }
	}

        /**
         * This action NEED authentication!
         * @param array $stdAppIds
         * @param integer $status
         */
	public function actionChangeApplicationStatus()
	{
            if (!(isset($_POST['stdAppIds']) && isset($_POST['status']))) {
                $this->returnError('Invalid request');
            }
            
            $stdAppIds = $_POST['stdAppIds'];
            $status = $_POST['status'];

            if (!in_array($status,[0,1,2,3])) {
                $this->returnError('Invalid status value');
            }

            if (!is_array($stdAppIds)) {
                $this->returnError('Invalid student application IDs');
            }
            
            // Get the current Project's model
            $project = $this->loadModel(StudentApplication::model()->findByPk($stdAppIds[0])->projectId);
            // Authorize the current user
            if ($project->getStaffRole(Yii::app()->user->staffId) == Project::ROLE_LEADER) {
                
                $errorIDs = array(); // List of the unsucessfully changed studentapplication's IDs
                $studentApps = StudentApplication::model()->findAllByPk($stdAppIds);
                // If some application IDs are not found in database
                if (count($studentApps) < count($stdAppIds)) {
                    $foundIDs = array();
                    foreach ($studentApps as $studentApp) {
                        array_push($foundIDs, $studentApp->id);
                    }
                    // Save the unfound IDs to $errorIDs
                    $errorIDs = array_diff($stdAppIds,$foundIDs);
                }
                foreach ($studentApps as $studentApp) {
                    $studentApp->status = $status;
                    if (!$studentApp->save()) {
                        array_push($errorIDs,$studentApp->id);
                    }
                }
                if (count($errorIDs) == 0) {
                    $this->returnSuccess();
                } else {
                    header('Content-type: application/json');
                    echo CJSON::encode(array(
                        'status'=>0,
                        'errorIDs'=>$errorIDs,
                        'message'=>'Some error occurred. Not every application status has been changed',
                    ));
                }
            } else {
                $this->returnError('You don\'t have permission to perform this task');
            }
	}
        
        public function actionAddStaff() {
            if (!(isset($_POST['projectId']) && isset($_POST['staffId']) && isset($_POST['role']))) {
                $this->returnError('Invalid request');
            }
            
            $staffId = $_POST['staffId'];
            $role = $_POST['role'];
            // Get the current Project's model
            $project = $this->loadModel($_POST['projectId']);
            if ($project) {
                $staffRole = $project->getStaffRole(Yii::app()->user->staffId);
                // Authorize the current user
                if ($staffRole == Project::ROLE_LEADER) {
                    try {
                        if ($projectStaffId = $project->addStaff($staffId,$role)){
                            header('Content-type: application/json');
                            echo CJSON::encode(array(
                                'status'=>1,
                                'staffId'=>$staffId,
                                'staff'=>$this->renderPartial('_project_staff_view',array(
                                    'data'=>ProjectStaff::model()->with('staff')->findByPk($projectStaffId),
                                    'index'=>0,
                                    'staffRole'=>$staffRole, // This is the current user's role in the project
                                ),true),
                            ));
                        } else {
                            $this->returnError('Cannot add staff to project');
                        }
                    } catch (CException $e) {
                        $this->returnError($e->getMessage());
                    }
                } else {
                    $this->returnError('You don\'t have permission to perform this task');
                }
            } else {
                $this->returnError('Invalid project ID');
            }
        }
        
        public function actionRemoveStaff() {
            if (!isset($_POST['prjStaffId'])) {
                $this->returnError('Invalid request');
            }
            $prjStaffId = $_POST['prjStaffId'];
            $projectStaff = ProjectStaff::model()->findByPk($prjStaffId);
            // Get the current Project's model
            $project = $this->loadModel($projectStaff->projectId);
            // Authorize the current user
            if ($project->getStaffRole(Yii::app()->user->staffId) == Project::ROLE_LEADER) {
                // If trying to remove a project leader
                if ($projectStaff->role == ProjectStaff::ROLE_LEADER) {
                    $leaderCount = ProjectStaff::leaderCount($projectStaff->projectId);
                    // If that leader is the current staff, which is the only project leader left
                    if ($leaderCount == 1) {
                        $this->returnError('You can not remove yourself from this project. A project need to have at least one leader.');
                    } 
                }
                if ($projectStaff->delete()) {
                    // If staff is removing himself from the project, refresh the page
                    if ($projectStaff->staffId == Yii::app()->user->staffId) {
                        header('Content-type: application/json');
                        echo CJSON::encode(array(
                            'status'=>1,
                            'refresh'=>1,
                        ));
                        Yii::app()->end();
                    }
                    $this->returnSuccess();
                } else {
                    $this->returnError('Some error prevents staff from being removed');
                }
            } else {
                $this->returnError('You don\'t have permission to perform this task');
            }
        }
        
        protected function returnSuccess() {
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
        protected function returnError($message) {
            header('Content-type: application/json');
            echo CJSON::encode(array(
                'status'=>0,
                'message'=>$message ? $message : 'Some error occured. Unable to complete request.',
            ));
            Yii::app()->end();
        }
        
        public function actionCreate() {
            $project = new Project;
            $location = new Location;
            
            //Ajax validation
            if(isset($_POST['ajax']) && $_POST['ajax']==='project-create-form'){
                echo CActiveForm::validate(array($location,$project));
                Yii::app()->end();
            }
            if (isset($_POST['Project'])) {
                $project->attributes = $_POST['Project'];
                $project->creator = Yii::app()->user->staffId;
                $isOK = true;
                if (isset($_POST['Location'])) {
                    $location->attributes = $_POST['Location'];
                    if ($location->save()) {
                        $project->locationId = $location->id;
                    } else $isOK = false;
                }
                if ($project->validate() && $isOK) {
                    $project->save();
                    // Assign the creator as the project leader
                    $projectStaff = new ProjectStaff;
                    $projectStaff->projectId = $project->id;
                    $projectStaff->staffId = Yii::app()->user->staffId;
                    $projectStaff->role = Project::ROLE_LEADER;
                    $projectStaff->save();
                    $this->redirect(array('/project'));
                }
            }
            
            $this->render('create',array(
                'project'=>$project,
                'location'=>$location,
            ));
        }
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Student the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
//            if (Yii::app()->user->accountType == User::TYPE_STUDENT) {
//                $condition = 'status='.Project::STATUS_PUBLIC;
//            } else 
//                $condition = '';
            $model=Project::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
	}
        
        public function actionTest() {
            echo CPasswordHelper::hashPassword('1234');
            echo '<br>';
            echo ModelHelper::convertDateForSave('2011-4-30');
        }
        
        /**
         * Delete a project. Only accept ajax request.
         */
        public function actionDelete(){
            if (!isset($_POST['projectId'])) {
                $this->returnError('Invalid request');
            }
            
            $projectId = $_POST['projectId'];
            $project = $this->loadModel($projectId);
            if ($project->status == Project::STATUS_NEW) {
                // Authorize the current user
                if ($project->getStaffRole(Yii::app()->user->staffId) == Project::ROLE_LEADER) {
                    if ($project->delete()) {
                        $this->returnSuccess();
                    } else  
                        $this->returnError();
                } else  
                    $this->returnError('You don\'t have permission to perform this task');
            } else {
                $this->returnError('This project cannot be deleted');
            }
        }
        
        public function actionAvailableStaffs($projectId){
            header('Content-type: application/json');
            echo CJSON::encode(Project::getAvailableStaffs($projectId));
        }
        
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
}