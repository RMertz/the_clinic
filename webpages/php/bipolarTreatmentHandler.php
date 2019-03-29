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
        $treatmentOptions = array();

        $treatmentOptions['biD']=' Bipolar Depression Treatment ';
        $treatmentOptions['biM']=' Bipolar Manic Treatment ';

        if($type['bipolarDTreatment'] == null && $type['bipolarMTreatment'] == null){
            $treatmentOptions['title'] ='Select Type of Bipolar Treatment to begin';
            $treatmentOptions['biD']='Bipolar_Depression Treatment ';
            $treatmentOptions['biM']='Bipolar_Manic Treatment ';
            $treatmentOptions['type']=0;
            return $treatmentOptions;
        }else if($type['bipolarDTreatment'] != null && $type['bipolarMTreatment'] != null){
            $treatmentOptions['title']='Select Which Type of Bipolar Treatment You Would Like to Continue';
            return $treatmentOptions;
        }else if($type['bipolarDTreatment'] != null){
            $treatmentOptions['title']='Select If You Would Continue Bipolar Depression Treatment Or Start a New Bipolar Manic Treatment';
            $treatmentOptions['biD']=' Continue Bipolar Depression Treatment ';
            $treatmentOptions['biM']=' New Bipolar Manic Treatment ';
            $treatmentOptions['type']=1;
            return $treatmentOptions;
        }else if($type['bipolarMTreatment'] != null){
            $treatmentOptions['title']='Select If You Would Continue Manic Depression Treatment Or Start a New Bipolar Depression Treatment';
            $treatmentOptions['biD']=" New_Bipolar_Depression_Treatment ";
            $treatmentOptions['biM']=' Continue Bipolar Manic Treatment ';
            $treatmentOptions['type']=2;
            return $treatmentOptions;
        }else{
            $treatmentOptions['title'] ='Select Type of Bipolar Treatment to Begin';
            $treatmentOptions['biD']=' Begin Bipolar Depression Treatment ';
            $treatmentOptions['biM']=' Begin Bipolar Manic Treatment ';
            $treatmentOptions['type']=3;
            return $treatmentOptions;
        }
    }

    public function whatToDo($type){


        include'Config.php';
        $patient = $db->prepare("SELECT `bipolarDTreatment`,`bipolarMTreatment` FROM PatientInformation WHERE `PatientID` = :patID");
        $patient->bindParam(":patID", $this->patID);
        $patient->execute();
        $treatment = $patient->fetch();
        if($type==1){
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
        if($type==2){
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