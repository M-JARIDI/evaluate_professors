<?php
class Repository {

    public static function connexion(){
        return new PDO("mysql:host=localhost:3308;dbname=evaluateprofessors_db","root","");
    }
	
    public static function fetchData($result){
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}
