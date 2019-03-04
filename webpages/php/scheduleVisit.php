<?php

class scheduleVisit
{
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }

    public function schedule($date){
        if($date == null){
            return false;
        }
        include'Config.php';
        $patient = "UPDATE `PatientInformation` SET `NextVisit` =? WHERE `PatientID` = ?";
        $patients = $db->prepare($patient);
        try {
            $patients->execute([$date, $this->id]);
        }catch (PDOException $po) {
            return false;
        }
        return true;

    }

}