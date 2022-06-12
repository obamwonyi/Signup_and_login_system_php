<?php 


namespace App\router;

/*
The request class soul purpose is to handle the type of request comming 
in and take action with respect to that . 
*/
class Request 
{
    //to fetch the type of request we are receiving 
    public function requestMethod() 
    {

        return $_SERVER["REQUEST_METHOD"];
    }

    //to fetch the route we are receiving .
    public function requestUri() 
    {
        return $_SERVER["REQUEST_URI"];
    }


    public function setResponseCode($code) 
    {
        http_response_code($code);
    }


}




?>