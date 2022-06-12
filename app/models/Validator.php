<?php 

namespace App\models;

use PDO;

class Validator 
{



    public function __construct()
    {
        
    }



    public function validateUsername($name) 
    {


        $result = preg_match('/^[a-z]\w{2,23}[^_]$/i',$name);

        //return (!$result) ? "false" : "true";
        if(!$result) 
        {
            return "false";
        } 
        else 
        {
            return "true";
        }

    }

    public function validateEmail($value) 
    {
        $sanitized_mail = filter_var($value, FILTER_SANITIZE_EMAIL);
        $mail = filter_var($value, FILTER_VALIDATE_EMAIL);
        //return (!$mail) ? "false":"true";

        if(!$mail) 
        {
            return "false";
        } 
        else 
        {
            return "true";
        }

    }

    public function validatePassword($password) 
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
           return "false";
        }else{
            return "true";
        }
    }


    public function passFormToMigration($validatedInput,$migration) 
    {
        $migration->submitForm($validatedInput);
    }
}





?>