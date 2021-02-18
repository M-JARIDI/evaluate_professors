<?php
require_once('src/model/RateRepository.php');
require_once('src/exception/ProfAlreadyRatedException.php');
require_once('src/exception/RateDoesntExistException.php');

class RateController{

   public function showProfRatesView($profId){
        $rates=RateRepository::findRateByProfId($profId);
        require('src/view/rates_prof_view.php');
    }

   public function showStudentRatesView($studentId,$message_){
        $message=$message_;
        $rates=RateRepository::findRateByStudentId($studentId);
        require('src/view/rates_student_view.php');
    }

   public function showUpdateRateForm($profId,$studentId){
        $prof=RateRepository::profRatedByStudent($profId,$studentId);
        require('src/view/rates_update_form.php');
    }

  public  function showSaveRateForm($studentId,$message_){
        $profs=RateRepository::findProfsByStudentId($studentId);
        $message=$message_;
        require('src/view/rates_save_form.php');
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
