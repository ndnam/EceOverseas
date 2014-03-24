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
                    'actions'=>array('index','view','test','changeApplicationStatus','changeStaffRole','addStaff','removeStaff'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('create','update'),
                    'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('admin','delete'),
                    'users'=>array('admin'),
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
            $dataProvider = new CActiveDataProvider('Project');
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));
        }
        
        /**
         * 
         * @param integer $id
         */
        public function actionView($id) {
            $model = new Project();
            
            // Update Project via Ajax
            if (isset($_POST['Project'])) {
                $model->attributes = $_POST['Project'];
                $model->setPrimaryKey($_POST['Project']['id']);
                $model->isNewRecord = false;
                
                //Ajax validation
                if(isset($_POST['ajax']) && $_POST['ajax']==='project-edit-form'){
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }
                //Save model
                if ($model->save()) {
                    $status = 1;
                } else 
                    $status = 0;
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
                ),
            ));
            
            $this->render('view',array(
                'model'=>$this->loadModel($id),
                'applications'=>$appDataProvider->getData(),
                'staffs'=>$staffDataProvider->getData(),
            ));
        }
        
	public function actionChangeStaffRole()
	{
            header('Content-type: application/json');
	    if (!(isset($_POST['projectStaffId']) && isset($_POST['role']))) {
                $this->returnError('Invalid request');
            }
            
            $projectStaffId = $_POST['projectStaffId'];
            $role = $_POST['role'];
            
	    if (!in_array($role,[1,2,3,4,5])) {
                $this->returnError('Invalid role value');
            }
            
            $projectStaff = ProjectStaff::model()->findByAttributes(array('id'=>$projectStaffId));
            if ($projectStaff) {
                $projectStaff->role = $role;
                if ($projectStaff->save()) {
                    $this->returnSuccess();
                } else {
                    $this->returnError('Error: Database record cannot be updated');
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
            
            $errorIDs = array();
            $studentApps = StudentApplication::model()->findAllByPk($stdAppIds);
            if (count($studentApps) < count($stdAppIds)) { // Some application IDs are not found in database
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
                echo CJSON::encode(array(
                    'status'=>0,
                    'errorIDs'=>$errorIDs,
                    'message'=>'Some error occurred. Not every application status has been changed',
                ));
            }
	}
        
        public function actionAddStaff() {
            header('Content-type: application/json');
            if (!(isset($_POST['projectId']) && isset($_POST['staffId']) && isset($_POST['role']))) {
                $this->returnError('Invalid request');
            }
            
            $projectId = $_POST['projectId'];
            $staffId = $_POST['staffId'];
            $role = $_POST['role'];
            if (is_null(Project::model()->findByPk($projectId))){
                $this->returnError('Invalid project ID');
            }
            if (is_null(Staff::model()->findByPk($staffId))) {
                $this->returnError('Invalid staff ID');
            }
            if (!in_array($role, [1,2,3,4,5])) {
                $this->returnError('Invalid role');
            }
            $projectStaff = new ProjectStaff;
            $projectStaff->role = $role;
            $projectStaff->staffId = $staffId;
            $projectStaff->projectId = $projectId;
            if ($projectStaff->save()){
            echo CJSON::encode(array(
                'status'=>1,
                'staff'=>$this->renderPartial('_project_staff_view',array(
                    'data'=>ProjectStaff::model()->with('staff')->findByPk($projectStaff->id),
                    'index'=>0,
                ),true),
            ));
            } else 
                $this->returnError ('Cannot add staff to project');
        }
        
        public function actionRemoveStaff() {
            header('Content-type: application/json');
            if (!isset($_POST['prjStaffId'])) {
                $this->returnError('Invalid request');
            }
            $prjStaffId = $_POST['prjStaffId'];
            if (ProjectStaff::model()->deleteByPk($prjStaffId) > 0) {
                $this->returnSuccess();
            } else
                $this->returnError('Error: cannot delete record');
        }
        
        protected function returnSuccess() {
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
            echo CJSON::encode(array(
                'status'=>0,
                'message'=>$message,
            ));
            Yii::app()->end();
        }
        
        public function actionCreate() {
            $project = new Project;
            $location = new Location;
            $firephp = FirePHP::getInstance(true);
            
            //Ajax validation
            if(isset($_POST['ajax']) && $_POST['ajax']==='project-create-form'){
                echo CActiveForm::validate(array($location,$project));
                Yii::app()->end();
            }
            if (isset($_POST['Project'])) {
                $project->attributes = $_POST['Project'];
                $isOK = true;
                if (isset($_POST['Location'])) {
                    $location->attributes = $_POST['Location'];
                    if ($location->save()) {
                        $project->locationId = $location->id;
                    } else $isOK = false;
                }
                if ($project->validate() && $isOK) {
                    $project->save();
                    $firephp->log($project->attributes);
                    $this->redirect(array('/project'));
                }
            }
            
            $firephp->log($project->attributes);
            $firephp->log($location->attributes);
            
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
            $model=Project::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
	}
        
        public function actionTest() {
            $this->redirect(array('/project'));
        }
        
        
        

}