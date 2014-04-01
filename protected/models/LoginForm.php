<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors()) {
                    $this->_identity = new UserIdentity($this->username,$this->password);
                    if (!$this->_identity->authenticate()) {
                        switch ($this->_identity->errorCode) {
                            case 1: $this->addError('username','Username doesn\'t exist.'); break;
                            case 2: $this->addError('password','Incorrect password.'); break;
                        }
                    }
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
                        
                        // Create profile records if it's the first time user log in
                        $user = User::model()->findByPk(Yii::app()->user->id);
                        if ($user->accountType == 1 && !isset($user->staffId)) {
                            $staff = new Staff;
                            $staff->save(false);
                            $user->staffId = $staff->id;
                            $user->save(false);
                        } else if ($user->accountType == 2 && !isset($user->studentId)) {
                            $student = new Student;
                            $student->save(false);
                            $user->studentId = $student->id;
                            $user->save(false);
                            $medicalInfo = new MedicalInfo;
                            $medicalInfo->studentId = $student->id;
                            $medicalInfo->save(false);
                            $nextOfKin = new NextOfKin;
                            $nextOfKin->studentId = $student->id;
                            $nextOfKin->save(false);
                        }
                        Yii::app()->user->setState('__userInfo',$user);
			return true;
		}
		else
			return false;
	}
}
