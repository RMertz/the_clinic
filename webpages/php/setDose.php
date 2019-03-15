<?php

class setDose
{
    public function __construct(){

    }

    public function setDose($patID,$medID,$dose){
        include'Config.php';
        $update = "UPDATE `PatientInformation` SET `MedicationID` =?, `CurrentDose` =? WHERE `PatientID` = ?";
        $set = $db->prepare($update);
        try {
            $set->execute([$medID, $dose,$patID]);
        }catch (PDOException $po) {
            return "Error: Dose not set";
        }
        return "Success!";
    }

}