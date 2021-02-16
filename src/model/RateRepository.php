<?php 
require_once("Repository.php");

class RateRepository extends Repository{

    //this function takes an id an returns all rates for a professor with this id
    public static function findRateByProfId($profId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("select * from evaluation where num_prof=? order by note desc");
        $result->execute(array($profId));
        return  RateRepository::fetchData( $result); 
    }
	
    public static function findProfsByStudentId($studentId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("select * from professeur where num_prof NOT IN ( select num_prof  from evaluation where num_etu =? )");
        $result->execute(array(intval($studentId)));
        return  RateRepository::fetchData( $result); 
    }
	
    //this function takes an id an returns all rates for a student with this id
    public static function findRateByStudentId($studentId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("select * from evaluation natural join professeur where num_etu=? order by note desc");
        $result->execute(array($studentId));
        return  RateRepository::fetchData( $result);
    }
	
    //this function takes an id of prof and id of student and returns the rate concerning them 
    public static function findRateByStudentProfId($studentId,$profId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("select * from evaluation where num_prof=? and num_etu=?");
        $result->execute(array($profId,$studentId));
        return  RateRepository::fetchData( $result);
    }
	
    public static function update($note,$text,$studentId,$profId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("update evaluation set  note=? ,text=? where num_etu=? and num_prof=?");
        $result->execute(array($note,$text,$studentId,$profId));
        return $result;
    }
	
    public static function save($note,$text,$studentId,$profId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("insert into evaluation values(?,?,?,?)");
        $result->execute(array($profId,$studentId,$text,$note));
        return $result;
    }
	
    public static function profRatedByStudent($profId,$studentId){
        $connexion=RateRepository::connexion();
        $result=$connexion->prepare("select * from professeur natural join evaluation  where num_prof =? and num_etu=?");
        $result->execute(array($profId,$studentId));
        return RateRepository::fetchData( $result);
    }
}