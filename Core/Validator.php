<?php

class Validator {

    public static function validEmail($email){

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } 

        return false;
    }
    
    public static function validString($string, $minimumNumber, $exceedLimit){

        $pattern = "/^[0-9a-zA-Z\s\.]{{$minimumNumber},{$exceedLimit}}$/";

        if (preg_match($pattern, $string)) {
            return true;
        }

        return false;

    }

    public static function validDescription($description){

        if (preg_match("/^[\p{L}\p{N}\p{P}\p{S}\s]{25,2500}$/u", $description)) {
            return true;
        }

        return false;
    }

    public static function validPhone($phone){

        if (preg_match("/^\d{11}$/", $phone)) {
            return true;
        } 

        return false;
    }

    public static function validDigits($digits, $start, $limit){

        $pattern = "/^\d{{$start},{$limit}}$/";

        if(preg_match($pattern, $digits)){
            return true;
        }
        
        return false;
    }

    public static function isValidImage($imageName){        

        if(preg_match("/\.(png|jpe?g)$/", $imageName)) {
            return true;
        } 

        return false;

    }

}