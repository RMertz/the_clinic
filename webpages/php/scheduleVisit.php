<?php

class scheduleVisit
{
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }

    public function schedule($date){
        include'Config.php';
        echo $date;
        $patient = "UPDATE `PatientInformation` SET `NextVisit` =? WHERE `PatientID` = ?";
        $patients = $db->prepare($patient);
        $patients->execute([$date,$this->id]);
        echo('yah');


    }

}