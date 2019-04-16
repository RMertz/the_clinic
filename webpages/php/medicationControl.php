<?php

class medicationControl
{
    public function __construct(){

    }

	public function checkConflict($patID,$medID){
        include 'Config.php';
		$set = $db->prepare("SELECT `MedicationID` FROM `Prescription` WHERE `PatientID` = :patID");
		$set->bindParam(":patID", $patID);
		$set->execute();
		$medConflict = $db->prepare("SELECT `MedicationID`, `ConflictingID` From `Conflicting Medication` WHERE ConflictingID = :med_ID OR MedicationID = :med_ID");
		$medConflict->bindParam(":med_ID", $medID);
		$medConflict->execute();
		$conflict = array($medConflict->fetch());
		foreach ($set as $val){
			foreach ($conflict as $con){
				if ($val['MedicationID']==$con['MedicationID']||$val['MedicationID']==$con['ConflictID']){
						return True;
				}
			}
		}
    }

    public function setDose($patID,$medID,$dose){
        include'Config.php';
        $update = $db->prepare("INSERT INTO `Prescription` (`MedicationID`, `CurrentDosage`, `PatientID`) VALUES ('$medID', '$dose', '$patID')");
        try {
			$update->execute();
			return "Success!";
        }catch (PDOException $po) {
            return "Error: Dose not set";
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
						$medID = $db->prepare("SELECT 'MediccationID' FROM `MedicationInformation` WHERE `Name` = :name");
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