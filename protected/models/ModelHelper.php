<?php

/**
 * Description of ModelHelper
 *
 * @author Ndnam
 */
class ModelHelper {
    
    public static function convertDateForSave($date) {
        $myDateTime = DateTime::createFromFormat('d/m/Y', $date);
        if ($myDateTime) {
            return $myDateTime->format('Y-m-d');
        } 
        return null;
    }
    
    public static function convertDateForDisplay($date) {
        if (strtotime($date)) {
            $myDateTime = DateTime::createFromFormat('Y-m-d', $date);
            if ($myDateTime) {
                return $myDateTime->format('d/m/Y');
            } 
        }
        return null;
    }
    
}
