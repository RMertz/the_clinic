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
		$medConflict = $db->prepare("SELECT `MedicationID1`, `MedicationID2` From `Conflicting Medication` WHERE `MedicationID1` = :med_ID OR `MedicationID2` = :med_ID");
		$medConflict->bindParam(":med_ID", $medID);
		$medConflict->execute();
		$conflict = array($medConflict->fetch());
		$numConflicts = 0;
		foreach ($set as $val){
			foreach ($conflict as $con){
				if ($val['MedicationID']==$con['MedicationID1']||$val['MedicationID']==$con['MedicationID2']){
						$numConflicts = $numConflicts+1;
				}
			}
		}
		return $numConflicts;
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
            $med = $db->prepare("INSERT INTO `MedicationInformation` (`MinimumDosage`, `MaximumDosage`, `Name`) VALUES (:mindose, :maxdose, :medname)");
            $med->bindParam(":medname", $name);
            $med->bindParam(":mindose", $minDose);
            $med->bindParam(":maxdose", $maxDose);
            try{
                $med->execute();
				if (sizeof($conflicts)>0){
					foreach ($conflicts as $var)
						$medID = $db->prepare("SELECT 'MedicationID' FROM `MedicationInformation` WHERE `Name` = :medname and MinimumDosage = :mindose and MaximumDosage = :maxdose");
						$medID->bindParam(":medname", $name);
						$medID->bindParam(":mindose", $minDose);
						$medID->bindParam(":maxdose", $maxDose);
						$medID->execute();
						$newMed = $medID->fetch();
						$newConflicts = $db->prepare("INSERT INTO `Conflicting Medication` (`MedicationID1`, `MedicationID2`) VALUES (:conflict, :newID)");
						$newConflicts->bindParam(":conflict", $var);
						$newConflicts->bindParam(":newID", $newMed);
						$newConflicts->execute();
				}
            }catch (PDOException $po){
                return 'Error: Medication not added';
            }
            return "Success!";
        }
    }

}