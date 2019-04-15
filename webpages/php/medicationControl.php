<?php

class medicationControl
{
    public function __construct(){

    }

    public function setDose($patID,$medID,$dose){
        include'Config.php';
        $update = "INSERT INTO `Prescription` (`MedicationID`, `CurrentDosage`, `PatientID`) VALUES (`MedicationID` =?, `CurrentDosage` =?, `PatientID` = ?)";
        $set = $db->prepare($update);
        try {
            if (checkConflict([$patID, $medID])){
                return "Error: Medication conflicts with current prescription"
            }
            else{
                $set->execute([$medID, $dose,$patID]);
            }
        }catch (PDOException $po) {
            return "Error: Dose not set";
        }
        return "Success!";
    }

    public function checkConflict($patID,$medID){
        include 'Config.php';
        $currPrescriptions = "SELECT `MedicationID` FROM `Prescriptions` WHERE `PatientID` =?";
        $set = $db->prepare($currPrescriptions);
        $set->execute([$patID])
        $medConflict = $db->prepare("SELECT `MedicationID` From `Conflicting Medication` WHERE ConflictingID = :med_ID OR MedicationID = :med_ID)");
        $medConflict->bindParam(":med_ID", $medID);
        $medConflict->execute();
        foreach ($set as $val){
                if (in_array($val['MedicationID'], $medConflict){
                        return True;
                }
        }

    }

    public function createMedication($name,$minDose,$maxDose,$conflicts){
        include'Config.php';
        $check = $db->prepare("SELECT MedicationID FROM `MedicationInformation` WHERE `Name` = :medname and MinimumDosage = :mindose and MaximumDosage = :maxdose");
        $check->bindParam(":medname", $name);
        $check->bindParam(":mindose", $minDose);
        $check->bindParam(":maxdose", $maxDose);
        $check->execute();
        if ($check->rowCount() != 0) {
            return "Sorry that combination already exists";
        } else {
            $med = $db->prepare("INSERT INTO `MedicationInformation` (`MedicatioonID`, `MinimumDosage`, `MaximumDosage`, `Diagnosis`, `Conflicting Medication`, `Name`) VALUES (NULL, :mindose, :maxdose, NULL, NULL, :medname)");
            $med->bindParam(":medname", $name);
            $med->bindParam(":mindose", $minDose);
            $med->bindParam(":maxdose", $maxDose);
            try{
                $med->execute();
				if (sizeof($conflicts)>0){
					foreach ($conflicts as $var)
						$medID = $db->prepare("SELECT 'MediccationID' FROM `MedicationInformation` WHERE `Name` = :name")
						$medID->bindParam(":name", $name);
						$medID->execute();
						$newConflicts = $db->prepare("INSERT INTO `Conflicting Medication` (`ConflictingID`, `MedicationID`) VALUES (:conflict, :newID)");
						$newConflicts->bindParam(":conflict", $var);
						$newConflicts->bindParam(":newID", $medID);
						$newConflicts->execute();
				}
            }catch (PDOException $po){
                return 'Error: Medication not added';
            }
            return "Success!";
        }
    }

}