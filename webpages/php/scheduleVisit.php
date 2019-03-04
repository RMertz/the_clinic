<?php

class scheduleVisit
{
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }

    public function schedule($date, int $type){
        if($date == null){
            return false;
        }
        include'Config.php';
        if($type=1) {
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