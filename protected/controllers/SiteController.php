<?php

class SiteController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
        
	public function accessRules()
	{
            return array(
                array('allow',  
                    'actions'=>array('contact','login'),
                    'users'=>array('*'),
                ),
                array('allow',  
                    'actions'=>array('index','logout','download'),
                    'users'=>array('@'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
	}
        
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->accountType == User::TYPE_STUDENT){
                    $this->redirect(array('student/publicProjects'));
                } else {
                    $this->redirect(array('project/'));
                }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				if (Yii::app()->user->accountType == User::TYPE_STUDENT){
                                    $this->redirect(array('student/publicProjects'));
                                } else {
                                    $this->redirect(array('project/index'));
                                }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
                unset($_SESSION['student']);
		$this->redirect(Yii::app()->homeUrl);
	}
        
        /**
         * Allow user to download a file from /files folder
         * File type:
         *  - Public: files in /files/public folder.
         *  - Private: files in /files/user folder. 
         * $path must not have slash at the begining.
         * (I use forward slash for file path)
         * @param string $type 
         * @param string $path
         */
        public function actionDownload($type,$path) {
            if (strrpos($path,'/') === FALSE) 
                $filename = $path;
            else 
                $filename = substr($path,strrpos($path,'/')+1,255);
            
            switch ($type) {
                case 'public': 
                    Yii::app()->request->sendFile($filename, file_get_contents(Yii::getPathOfAlias('webroot').'/files/public/'.$path));
                    break;
                case 'private':
                    $targetUser = substr($path, 0, strpos($path,'/'));
                    // Only staff account is allowed to acccess another user's private file
                    if ($targetUser == Yii::app()->user->username || Yii::app()->user->accountType == User::TYPE_STAFF) { 
                        $fullPath = Yii::getPathOfAlias('webroot').'/files/user/'.$path;
                        // If requesting user profile picture and it doesn't exist, send the default one.
                        if (!file_exists($fullPath)) {
                            switch($filename) {
                                case 'photo': Yii::app()->request->sendFile('photo',file_get_contents(Yii::getPathOfAlias('webroot').'/files/user/default_profile_pic.png')); break;
                                case 'passport': Yii::app()->request->sendFile('photo',file_get_contents(Yii::getPathOfAlias('webroot').'/files/user/default_passport.jpg')); break;
                            }
                        } else
                            Yii::app()->request->sendFile($filename, file_get_contents($fullPath));
                    } else throw new CHttpException(403);
                    break;
            }
        }
        
        /**
         * Receive a file uploaded from client
         * @param string $type 'photo'|'passport'
         * @param string $username 
         * @param string $format 'json'
         */
        public function actionUpload($type,$username,$format) {
            
        }
}