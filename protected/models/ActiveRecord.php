<?php

/**
 * Extend this class to be able to save only the validated attributes
 * @property string $created
 * @property string $modified
 * @author Ndnam
 */
class ActiveRecord extends CActiveRecord {
    
    public function beforeSave() {
        $this->modified = NULL;
        if ($this->isNewRecord) 
            $this->created = NULL;
        return parent::beforeSave();;
    }
    
    /**
     * Filter the validated attributes and save to database
     * @param boolean $runValidation
     * @param array $attributes
     */
    public function save($attributes=null) {
        $attrs = array();
        // Always run validation
        $this->validate();
        if ($attributes) {
            // Filter the validated attributes
            foreach ($attributes as $attribute) {
                if (!$this->hasErrors($attribute)) {
                    array_push($attrs, $attribute);
                }
            }
        } else {
            // Get the array of validated attributes
            foreach ($this->attributes as $name=>$value) {
                if (!$this->hasErrors($name)) {
                    array_push($attrs, $name);
                }
            }
        }
        return parent::save(false, $attrs); //Save to database whether validation passed or not
    }
        
}
