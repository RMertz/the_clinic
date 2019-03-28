<?php

class bipolarTreatmentHandler
{

    private $patID;

    public function __construct(int $patID)
    {
        $this->patID = $patID;
    }

    public function checkTreatment(){
        include'Config.php';

        $patient = $db->prepare("SELECT `bipolarDTreatment`,`bipolarMTreatment` FROM PatientInformation WHERE `PatientID` = :patID");
        $patient->bindParam(":patID", $this->patID);
        $patient->execute();
        $type = $patient->fetch();

        if($type['bipolarDTreatment'] == null && $type['bipolarMTreatment'] == null){
            return 0;
        }else if($type['bipolarDTreatment'] != null && $type['bipolarMTreatment'] != null){
            return 1;
        }else if($type['bipolarDTreatment'] != null){
            return 2;
        }else if($type['bipolarMTreatment'] != null){
            return 3;
        }else{
            return 4;
        }
    }

    public function whatToDo($type){

        if($type==0){
            return true;
        }else if($type==1){
            return false;
        }
        include'Config.php';
        $patient = $db->prepare("SELECT `bipolarDTreatment`,`bipolarMTreatment` FROM PatientInformation WHERE `PatientID` = :patID");
        $patient->bindParam(":patID", $this->patID);
        $patient->execute();
        $treatment = $patient->fetch();
        if($type==2){
            switch($treatment['bipolarDTreatment']){
                case 0:
                    header("Location: ../bipolar/bipolarD/bipolarDHome.php?id=".$this->patID);
                    break;
                case 1:
                    header("Location: ../bipolar/bipolarD/bipolarD1-1.php?id=".$this->patID);
                    break;
                case 2:
                    header("Location: ../bipolar/bipolarD/bipolarD1-2.php?id=".$this->patID);
                    break;
                case 3:
                    header("Location: ../bipolar/bipolarD/bipolarD1-3.php?id=".$this->patID);
                    break;
                case 4:
                    header("Location: ../bipolar/bipolarD/bipolarD2-1.php?id=".$this->patID);
                    break;
                case 5:
                    header("Location: ../bipolar/bipolarD/bipolarD2-2.php?id=".$this->patID);
                    break;
                case 6:
                    header("Location: ../bipolar/bipolarD/bipolarD3.php?id=".$this->patID);
                    break;
                case 7:
                    header("Location: ../bipolar/bipolarD/bipolarD4.php?id=".$this->patID);
                    break;
                default:
                    header("Location: ../bipolar/bipolarD/bipolarDHome.php?id=".$this->patID);
                    break;
            }
        }
        if($type==3){
            switch($treatment['bipolarMTreatment']){
                case 0:
                    header("Location: ../bipolar/bipolarM/bipolarMHome.php?id=".$this->patID);
                    break;
                case 1:
                    header("Location: ../bipolar/bipolarM/bipolarM1-1.php?id=".$this->patID);
                    break;
                case 2:
                    header("Location: ../bipolar/bipolarM/bipolarM1-2.php?id=".$this->patID);
                    break;
                case 3:
                    header("Location: ../bipolar/bipolarM/bipolarM2.php?id=".$this->patID);
                    break;
                case 4:
                    header("Location: ../bipolar/bipolarM/bipolarM3.php?id=".$this->patID);
                    break;
                case 5:
                    header("Location: ../bipolar/bipolarM/bipolarM4.php?id=".$this->patID);
                    break;
                default:
                    header("Location: ../bipolar/bipolarM/bipolarMHome.php?id=".$this->patID);
                    break;
            }
        }
    }
}