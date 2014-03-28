<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author Ndnam
 */
class WebUser extends CWebUser
{
    
    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user = $this->getState('__userInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
            if (isset($user->$name)) {
                return $user->$name;
            }
        }
 
        return parent::__get($name);
    }
 
    public function login($identity, $duration=0) {
        $this->setState('__userInfo', $identity->getUser());
        parent::login($identity, $duration);
    }
 
    /* 
    * Required to checkAccess function
    * Yii::app()->user->checkAccess('operation')
    */
    public function getId()
    {
        return $this->id;
    }
}
