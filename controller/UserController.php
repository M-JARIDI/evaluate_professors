<?php
    require_once('exception/UserNotFoundException.php');
    require_once("model/UserRepository.php");
    class UserController {

     public function  showLoginForm($message){
            $erreur=$message;
        require('view/log_in_form.php');
    }

    public function  logIn($username,$password){
        $student= UserRepository::findStudentByUsername($username,$password);
        if(count($student)==1){
            session_start();
            $_SESSION['id']=$student[0]['num_etu'];
            $_SESSION['user']=$student[0]['nom']." ".$student[0]['prenom'];
            header("location:index.php?action=rates_save_form");
        }
        else{
            session_start();
            $prof=UserRepository::findProfByUsername($username,$password);
            if(count($prof)==1){
              $id=$prof[0]['num_prof'];
              $_SESSION['user']=$prof[0]['nom']." ".$prof[0]['prenom'];
              header("location:index.php?action=rates_prof_view&id=$id");
            }
          else
              throw new UserNotFoundException();
        
        }
    }
    
    public function  logOut(){
        session_start();
        session_unset();
        session_destroy();
    }
    public function  show404(){
        require_once("view/404.php");
    }
}