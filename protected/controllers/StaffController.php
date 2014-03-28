<?php

class StaffController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionView()
	{
		$this->render('view');
	}
        
        public function actionCreate() {
            $staff = new Staff;
            $user = new User;
            $user->accountType = User::TYPE_STAFF;
            
            //Ajax validation
            if(isset($_POST['ajax']) && $_POST['ajax']==='staff-create-form'){
                echo CActiveForm::validate(array($user,$staff));
                Yii::app()->end();
            }
            
            if (isset($_POST['Staff'])) {
                $staff->attributes = $_POST['Staff'];
                
                if (isset($_POST['User'])) 
                    $user->attributes = $_POST['User'];
                    
                if ($staff->validate() * $user->validate()) {
                    if ($staff->save()) {
                        $user->staffId = $staff->id;
                        if ($user->save()) {
                            $this->redirect(array('project/index'));
                        }
                    }
                }
            }
            
            $this->render('create',array(
                'user'=>$user,
                'staff'=>$staff,
            ));
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