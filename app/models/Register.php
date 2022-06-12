<?php 

namespace App\models;

use App\migrations\Users;

class Register extends Validator
{


    //validates the input from the register page 
    public function validateRegisterInput(array $array) 
    {
        $array["username"] = $this->validateUsername($array["username"]);
        $array["email"] = $this->validateEmail($array["email"]);
        $array["password"] = $this->validatePassword($array["password"]);

        return $array;
    }

    public function registerUser($array) 
    {
        $migration =  new Users();
        $this->passFormToMigration($array,$migration);
    }

}




?>