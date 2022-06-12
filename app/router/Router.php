<?php

namespace App\router;
use App\controllers\PageController;
use App\controllers\AuthController;
use App\router\Request;
class Router
{
    //to store routes of different request types , post , put , get , update and so on
    public $routes = [];
    public $request;

    //pass in the instance of the request class and immidiately assign it
    // to the request veriable .
    public function __construct()
    {
        //assigning the value of the instance of the request pass from the index.php
        // to this instance of this class own instance .
        $this->request =new Request;
    }

    //handling a get request , to receive a url and a view as it's parameter
    public function get($url, $array)
    {
        $this->routes['GET'][$url] = $array;
    }

    //handling a post request with url and $array of post data.
    public function post($url, $array)
    {
        $this->routes['POST'][$url] = $array;
    }

    public function execute()
    {
        $method = $this->request->requestMethod();
        $url = $this->request->requestUri();
        $path = $this->routes[$method][$url] ?? false;

        //handle page not available
        //handling get request
        if ($method === 'GET') 
        {
            if ($path === false) 
            {
                $this->request->setResponseCode(404);
                return $this->rederView('404',[]);
            }
            $page = call_user_func($this->routes[$method][$url]);

            return $this->rederView($page,[]);
        }

        elseif($method === "POST")
        {
            if($path === false) 
            {
                $this->request->setResponseCode(404);
                return $this->rederView('404',[]);
            }

            $error_value = call_user_func($this->routes[$method][$url]);
            if(!empty($error_value)) 
            {
                //return print_r($this->rederView($_SERVER["REQUEST_URI"],$error_value));
                return $this->rederView($_SERVER["REQUEST_URI"],$error_value);
            }
        }
    }

    public function rederView($page,$array)
    {
        $layout = $this->layout();
        $template = $this->template($page,$array);
        $output = str_replace('{{template}}', $template, $layout);
        return print_r($output);
    }

    public function layout()
    {
        ob_start();
        include_once __DIR__ . '/../views/layout/main.php';
        return ob_get_clean();
    }

    public function template($path,$array)
    {
        $errorValue = $array;
        ob_start();
        include_once __DIR__ . "/../views/$path.php";
        return ob_get_clean();
    }
}

?>
