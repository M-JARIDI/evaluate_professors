<?php 

require_once("exception/UserNotFoundException.php");
require_once("controller/UserController.php");
require_once("controller/RateController.php");
$userController =new UserController();
$rateController=new RateController();
if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action){
        case "login":
        {
            try{
                if(isset($_POST['username']) && isset($_POST['password'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                   $userController->logIn($username,$password);
                }
                
            }
            catch(UserNotFoundException $e){
                $userController->showLoginForm(true);
            }

        }break;
        case "rates_save_form":{
            session_start();
            if(isset($_SESSION['id'])){
                $studentId=$_SESSION['id'];
                $rateController->showSaveRateForm($studentId,"");
            }    
        }break;
        case "save_rate":{
            try{
                session_start();
                if(isset($_POST['text']) && isset($_POST['prof']) && isset($_POST['note'])&& isset($_SESSION['id']))
                {   $note=$_POST['note'];
                    $text=$_POST['text'];
                    $studentId=$_SESSION['id'];
                    $profId=$_POST['prof'];
                    $rateController->saveRate($note,$text,$studentId,$profId);
                    $rateController->showSaveRateForm($studentId,"successfull");
                }
            }
            catch(ProfAlreadyRatedException $e){
                $rateController->showSaveRateForm(-1,"failed");
            }
        }break;
        case "rates_prof_view":{
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $profId=$_GET['id'];
                $rateController->showProfRatesView($profId);
            }

        }break;
        case "rates_student_view":{
            session_start();
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                $studentId=$_SESSION['id'];
                $rateController->showStudentRatesView($studentId,"");
            }

        }break;
        case "update_form":{
            session_start();
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])&&isset($_GET['id']) && !empty($_GET['id'])){
                    $studentId=$_SESSION['id'];
                    $profId=$_GET['id'];
                    $rateController->showUpdateRateForm($profId,$studentId);
            }
        }break;
        case "update":{
            session_start();
            try{
                if(isset($_POST['text']) && isset($_POST['prof']) && isset($_POST['note'])&& isset($_SESSION['id']))
                {   $note=$_POST['note'];
                    $text=$_POST['text'];
                    $studentId=$_SESSION['id'];
                    $profId=$_POST['prof'];
                    $rateController->updateRate($note,$text,$studentId,$profId);
                    $rateController->showStudentRatesView($studentId,"successfull");
                }
            }
            catch(ProfAlreadyRatedException $e){
                $rateController->showStudentRatesView(-1,"failed");
            }
        }break;
        case "logout":$userController->logout(); $userController->showLoginForm(false);
        break;
        default :$userController->show404();
    }
}
else
{
    $userController->showLoginForm(false);
}
