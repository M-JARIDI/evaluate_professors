<?php
require_once("Repository.php");
class UserRepository extends Repository {
   
   public static function  findStudentByUsername($username,$password){
        $connexion=UserRepository::connexion();
        $result=$connexion->prepare("select * from etudiant where nom=? && prenom=? ");
        $result->execute(array($username,$password));
        return UserRepository::fetchData($result);
   }
   public static function  findProfByUsername($username,$password){
    $connexion= UserRepository::connexion();
    $result=$connexion->prepare("select * from professeur where nom=? && prenom=? ");
    $result->execute(array($username,$password));
    return UserRepository::fetchData($result);
}
}