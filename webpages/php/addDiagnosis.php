<?php


class addDiagnosis
{
    public function __construct()
    {

    }

    public function addDiagnosisToPatient($id,$diagnosis){
        include 'Config.php';
        $add = "UPDATE `PatientInformation` SET `Diagnosis` =? WHERE `PatientID` =?";
        $toAdd = $db->prepare($add);
        try {
            $toAdd->execute([$diagnosis, $id]);
        }catch (PDOException $po) {
            return "Error: Diagnosis not added";
        }
        return "Added Diagnosis";
    }
}