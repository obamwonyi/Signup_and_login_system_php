<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use App\controllers\PageController;
use App\controllers\AuthController;
use App\router\Application;

$app = new Application();


//the user page route 
$app->router->get("/user", [PageController::class,"user"]);
//-----the router can handle a get request and post request (as in differentiate them) from the url.
$app->router->get("/register", [AuthController::class,"register"]);
//------handling a post request to the register page  . 
$app->router->post("/register", [AuthController::class, "handleRegistration"]);

//handling a get request to the login page . 
$app->router->get("/login", [AuthController::class, "login"]);
//handling a post request to the login page. 
$app->router->post("/login", [AuthController::class, "handleLogin"]);

$app->run(); 





?>