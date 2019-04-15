<?php


class updateTreatmentPosition
{
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }

    public function updateStep(int $type,int $step){
        include'Config.php';
        if($type==1) {
            $update = "UPDATE `PatientInformation` SET `bipolarMTreatment` =? WHERE `PatientID` = ?";
        }else if($type==2){
            $update = "UPDATE `PatientInformation` SET `bipolarDTreatment` =? WHERE `PatientID` = ?";
        }else if($type==3){
            $update = "UPDATE `PatientInformation` SET `depTreatment` =? WHERE `PatientID` = ?";
        }else{
            return false;
        }
        $patients = $db->prepare($update);
        try {
            $patients->execute([$step, $this->id]);
        }catch (PDOException $po) {
            return false;
        }
        return true;
    }

    public function updatePrevStep(int $type,int $step){
        include'Config.php';
        if($type==1) {
            $update = "UPDATE `PatientInformation` SET `bipolarMPrevTreatment` =? WHERE `PatientID` = ?";
        }else if($type==2){
            $update = "UPDATE `PatientInformation` SET `bipolarDPrevTreatment` =? WHERE `PatientID` = ?";
        }else if($type==3){
            $update = "UPDATE `PatientInformation` SET `depPrevTreatment` =? WHERE `PatientID` = ?";
        }else{
            return false;
        }
        $patients = $db->prepare($update);
        try {
            $patients->execute([$step, $this->id]);
        }catch (PDOException $po) {
            return false;
        }
        return true;
    }

}