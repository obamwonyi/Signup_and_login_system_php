<?php 




namespace App\migrations;

use App\router\Router;




class Users extends Pdo
{
    private const HOST = "localhost";
    private const DBNAME = "users";
    private const USER = "Fawkes"; 
    private const PASSWORD = "666365356FaeS";
    public $pdo;

    public function __construct()
    {
        //$this->pdo = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DBNAME,$this->USER,$this->PASSWORD);
        //the pdo value is the actual instance of the pdo return from the connection file . 
        //$this->pdo = $this->connectDb([$this->HOST,$this->DBNAME,$this->USER, $this->PASSWORD]); 

    }


    //(1)connect to the database 
    //(2)then pass the form to the 

    public function submitForm($array) 
    {
        $this->pdo = $this->connectDb([self::HOST,self::DBNAME,self::USER, self::PASSWORD]); 

        $sql = " 
            INSERT INTO users SET 
            `username` = :username, 
            `email` = :email, 
            `password` = :password
        ";

        //query to check a user with the same username already exist .
        $username = $array['username'];
        $sqlForUserCheck = "SELECT id FROM users WHERE username ='$username'";

        $checkForUser = $this->pdo->query($sqlForUserCheck)->fetch();


        $router = new Router();
        if(!empty($checkForUser[0])) 
        {
            
            $array["username"] = '<span style="color:red">The user already exist</span>';
            $array["password"] = "";
            $router->rederView("/register",$array);
        }
        else
        {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":username", $array["username"]); 
            $stmt->bindValue(":email",$array["email"]);
            $stmt->bindValue(":password",password_hash($array["password"],PASSWORD_BCRYPT));

            $stmt->execute();
            
            $router->rederView("submitsuccess",[]);
        }
        






    }
}

?>