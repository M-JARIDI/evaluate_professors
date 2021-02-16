<?php
class Repository {

    public static function connexion()
    {
        // $server = "sql304.epizy.com";
        // $username = "epiz_27912806";
        // $password= "wmYC7pjWlf0";
        // $dbname = "epiz_27912806_evaluateprofessors_db";
        $server = "localhost:3308";
        $username = "root";
        $password= "";
        $dbname = "evaluateprofessors_db";
        return new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
    }
	
    public static function fetchData($result)
    {
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}
