<?php 

namespace App\controllers;
use App\models\Login;
use App\models\Register;
use App\router\Router;

class AuthController 
{


    public function login() 
    {
        return "login";
    }

    public function handleLogin() 
    {


        $array = 
        [
            "email" => $_POST["email"], 
            "password" => $_POST["password"]
        ];

        if(empty($array["email"])  || empty($array["password"]))
        {
            if(empty($array["email"]))
            {
                $array["email_error"] = '<span style="color:red">please enter your email </span>';
            }

            if(empty($array["password"])) 
            {
                $array["password_error"] = '<span style="color:red">please enter your correct password </span>';
            }

            /*
            echo "<pre>";
            print_r($array);
            echo "<pre>";
            */
            $router = new Router();
            $router->rederView("/login",$array);
            
        }

        else
        {
            $login = new Login();
            $login->validateLoginInput($array);
        }
    }


    public function register() 
    {
        return "register";
    }

    public function handleRegistration() 
    {
        //instanciating the register model to be used for actual validation 
        $register_instance = new Register();
        $errorEmail = '<span style="color:red">Please insert an email address</span>';
        $errorPassword = '<span style="color:red">please enter a strong password</span>';
        $errorUsername = '<span style="color:red">please enter your username </span>';
        $emptyUsernameCheck = empty($_POST["username"]);
        $emptyEmailCheck = empty($_POST["email"]);
        $emptyPasswordCheck = empty($_POST["password"]);
        $array = 
        [
            "username" => $emptyUsernameCheck ? $errorUsername : $_POST["username"],
            "email" => $emptyEmailCheck ?  $errorEmail : $_POST["email"],
            "password" => $emptyPasswordCheck ? $errorPassword : ((!($emptyEmailCheck) && !($emptyUsernameCheck) &&  !($emptyPasswordCheck)) ? $_POST["password"] : "")
        ];

        $router_instance = new Router();
        if($emptyUsernameCheck || $emptyEmailCheck || $emptyPasswordCheck) 
        {
            
            //return the route 
            $array["user_value"] = $array["username"];
            $array["email_value"] = $array["email"];
            return $router_instance->rederView($_SERVER["REQUEST_URI"], $array);

        }
        else
        {
            $validationCheck = $register_instance->validateRegisterInput($array);
            $checkUsernameValidity = $validationCheck["username"]; 
            $checkEmailValidity = $validationCheck["email"]; 
            $checkPasswordValidity = $validationCheck["password"];

            if($checkUsernameValidity === "false" || $checkEmailValidity === "false" || $checkPasswordValidity === "false") 
            {
                $valUsernameError = '<span style="color:red">please enter a username with no special chars </span>';
                $valEmailError = '<span style="color:red">please enter a valid email </span>';
                $array["username"] = ($checkUsernameValidity === "false") ? $valUsernameError : $array["username"];
                $array["email"] = ($checkEmailValidity === "false") ? $valEmailError : $array["email"];
                $array["password"] = ($checkPasswordValidity === "false") ? $errorPassword :"";
                //$emptyPasswordCheck ? $errorPassword : ((!($emptyEmailCheck) && !($emptyUsernameCheck) &&  !($emptyPasswordCheck)) ? $_POST["password"] : "")


                $array["user_value"] = $array["username"];
                $array["email_value"] = $array["email"];

                return $router_instance->rederView($_SERVER["REQUEST_URI"], $array);
            }
            else
            {
                $register_instance->registerUser($array);
            }
        }

    }



    private function filterInput($input) 
    {
        $trim = trim($input); 
        $strip = stripslashes($trim);
        $entitify = htmlspecialchars($strip, ENT_QUOTES, "UTF-8");
        return $entitify;
    }
}




?>