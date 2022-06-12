<?php 

namespace App\models;
use App\models;
use App\router\Router;
use App\migrations\Pdo;

class Login extends Validator
{

    //receive login input when submitted, if the input is not empty 
    //then filter it in the AuthController class with the filter() method
    //and finally pass the value to this place

    public function validateLoginInput(array $array) 
    {
        $validateEmail = $this->validateEmail($array["email"]);
        $validatePassword = $this->validatePassword($array["password"]);

        if($validateEmail === "false" || $validatePassword == "false")
        {

            if($validateEmail === "false") 
            {
                $array["email_error"] = '<span style="color:red">please enter your correct email </span>';
            }

            if($validatePassword === "false") 
            {
                $array["password_error"] = '<span style="color:red">please enter your correct password </span>';
            }


            $router = new Router();

            $router->rederView("/login", $array);
            
        }
        else
        {
            $pdo = new Pdo();

            $pdo = $pdo->connectDb(["localhost","users","Fawkes","666365356FaeS"]);

            $sql = "SELECT `password` FROM users WHERE `email`=:email";

            $pdo = $pdo->prepare($sql);

            $pdo->bindParam(":email", $array["email"]);

            $pdo->execute();

            $result = $pdo->fetch();

            $passworCheck = password_verify($array["password"],$result["password"]);


            if($passworCheck) 
            {
                echo "you are loged in";
            }

        }
    }
}



?>