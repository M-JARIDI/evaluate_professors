<?php
require_once('model/RateRepository.php');
require_once('exception/ProfAlreadyRatedException.php');
require_once('exception/RateDoesntExistException.php');

class RateController{
    //Functions to show views
   public function showProfRatesView($profId){
        $rates=RateRepository::findRateByProfId($profId);
        require('view/rates_prof_view.php');
    }

   public function showStudentRatesView($studentId,$message_){
        $message=$message_;
        $rates=RateRepository::findRateByStudentId($studentId);
        require('view/rates_student_view.php');
    }

   public function showUpdateRateForm($profId,$studentId){
        $prof=RateRepository::profRatedByStudent($profId,$studentId);
        require('view/rates_update_form.php');
    }

  public  function showSaveRateForm($studentId,$message_){
        $profs=RateRepository::findProfsByStudentId($studentId);
        $message=$message_;
        require('view/rates_save_form.php');
    }

    //Functions to add and update rates
   public function saveRate($note,$text,$studentId,$profId){
        $rate=RateRepository::findRateByStudentProfId($studentId,$profId);
        if(count($rate)==0){
            RateRepository::save($note,$text,$studentId,$profId);
        }
        else{
           throw new ProfAlreadyRatedException();
        }

    }
    
   public  function updateRate($note,$text,$studentId,$profId){
        $rate=RateRepository::findRateByStudentProfId($studentId,$profId);
        if(count($rate)==1){
            RateRepository::update($note,$text,$studentId,$profId);
        }
        else
        throw new RateDoesntExistException()  ;
    }

}
