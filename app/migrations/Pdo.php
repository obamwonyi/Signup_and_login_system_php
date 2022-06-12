<?php 

function connectPdo($array)  
{



    try
    {
        $pdo = new PDO("mysql:host=".$array[0].";dbname=".$array[1],$array[2],$array[3]);
        return $pdo;
    }
    catch(PDOException $e) 
    {
        $pdo = "The error ".$e->getMessage(). " occured in file .".$e->getFile(). " on line ".$e->getLine();
        return $pdo ; 
    }
}

namespace App\migrations;


class Pdo 
{


    public function connectDb($array) 
    {

        $pdo = connectPdo($array); 
        return $pdo;
    
    }
}



?>