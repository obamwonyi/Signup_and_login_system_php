<?php 


namespace App\router;
use App\router\Router;
use App\router\Request;

class Application 

{
    public $router;

    //to store the instance of the router class . 

    public function __construct()
    {
        $this->router = new Router(new Request);
    }
    //to execute the route 
    public function run() 
    {

       $this->router->execute();

    }
}







?>