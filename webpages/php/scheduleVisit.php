<?php

class scheduleVisit
{
    private $id;

    public function __construct($passedID){
        $id = $passedID;
    }

    public function schedule($date,$type){
        if($date == null||$date<date("Y-m-d")){
            return false;
        }
        include'Config.php';
        if($type==1) {
            $patient = "UPDATE `PatientInformation` SET `LastVisit` =? WHERE `PatientID` = ?";
        }else{
            $patient = "UPDATE `PatientInformation` SET `NextVisit` =? WHERE `PatientID` = ?";
        }
        $patients = $db->prepare($patient);
        try {
            $patients->execute([$date, $this->id]);
        }catch (PDOException $po) {
            return false;
        }
        return true;

    }

}