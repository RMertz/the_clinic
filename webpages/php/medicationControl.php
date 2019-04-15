<?php

class medicationControl
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

    public function createMedication($name,$minDose,$maxDose){
        include'Config.php';
        $check = $db->prepare("SELECT MedicationID FROM `MedicationInformation` WHERE `Name` = :medname and MinimumDosage = :mindose and MaximumDosage = :maxdose");
        $check->bindParam(":medname", $name);
        $check->bindParam(":mindose", $minDose);
        $check->bindParam(":maxdose", $maxDose);
        $check->execute();
        if ($check->rowCount() != 0) {
            return "Sorry that combination already exists";
        } else {
            $med = $db->prepare("INSERT INTO `MedicationInformation` (`MedicationID`, `MinimumDosage`, `MaximumDosage`, `Diagnosis`, `Conflicting Medication`, `Name`) VALUES (NULL, :mindose, :maxdose, NULL, NULL, :medname)");
            $med->bindParam(":medname", $name);
            $med->bindParam(":mindose", $minDose);
            $med->bindParam(":maxdose", $maxDose);
            try{
                $med->execute();
            }catch (PDOException $po){
                return 'Error: Medication not added';
            }
            return "Success!";
        }
    }

}