<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        private $id;
        private $user;
        
	public function authenticate()
	{
                /* @var $user User */
                $user = User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
            
		if ($user == null)
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif (!$user->validatePassword($this->password))
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
                    $this->id = $user->id;
                    $this->username = $user->username;
                    $this->errorCode = self::ERROR_NONE;
                    $this->setUser($user);
                }
		return $this->errorCode == self::ERROR_NONE;
	}
        
	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->id;
	}
        
        public function getUser()
        {
            return $this->user;
        }

        public function setUser(CActiveRecord $user)
        {
            $this->user = $user->attributes;
        }
}