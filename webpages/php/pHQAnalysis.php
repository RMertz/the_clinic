<?php

class pHQAnalysis
{
    private $id;

    public function __construct(int $id){
        $this->id = $id;
    }

    public function getResults(int $type,  int $q1, int $q2, int $q3, int $q9, int $total){
        if($type==0){
            if($q1==1&&$q2==1&&$q3==1) {
                $analysis['diagnosis'] = "Depression";
                $analysis['diagnosisHeader'] = "Diagnosis: ";
                $analysis['diagnosisInfo']= "Due to your patients responses from the PHQ we recommend making a tentative diagnosis of ".$analysis['diagnosis']." after ruling out physical causes,
         normal bereavement and a history of manic or hypomanic episode.";
                $analysis['treatmentType'] ="Treatment";
            }else{
                $analysis['diagnosis'] = "None";
                $analysis['diagnosisInfo'] = '';
                $analysis['diagnosisHeader']="Diagnosis: ";
                $analysis['treatmentType']="Treatment";
            }
        }else{
            $analysis['diagnosis'] ='';
            $analysis['diagnosisHeader']='';
            $analysis['diagnosisInfo']='';
            $analysis['treatmentType']="A Treatment change";
        }
        if($q1==1||$q3==1){
            $analysis['treatmentTF']=$analysis['treatmentType']." may be warranted because at least one of the first two questions
was rated a 2 or 3 OR question 10 was rated at least Somewhat difficult.";
        }else{
            $analysis['treatmentTF']=$analysis['treatmentType']." may NOT be warranted because none of the first two questions
was rated a 2 or 3 OR question 10 was rated Somewhat difficult or above.";
        }
        if($q9>0){
            $analysis['suicide']="Due to positive answer to question 9 it is recommenced that the patient is assessed for suicide risk.";
        }else{
            $analysis['suicide']="Due to negative answer to question 9 it is NOT recommenced that the patient is assessed for suicide risk.";
        }
        if($total>=5 && $total<10){
            $analysis['tentativeDiag'] = " Minimal Symptoms ";
            $analysis['treatmentRec'] = "Support, ask to call if worse, return in 1 month";
        }else if($total>=10 && $total<15){
            $analysis['tentativeDiag'] = " Minor Depression Dysthymia or Major Depression, Mild ";
            $analysis['treatmentRec'] = "Support, contact in one week. Antidepressant or psychotherapy,
contact in one week";
        }else if($total>=15 && $total<20){
            $analysis['tentativeDiag'] = " Major Depression, Moderate ";
            $analysis['treatmentRec'] = "Antidepressant or psychotherapy";
        }else if($total>=20){
            $analysis['tentativeDiag'] = " Major Depression, Severe ";
            $analysis['treatmentRec'] = "Antidepressant and psychotherapy (especially if not improved on monotherapy)";
        }else{
            $analysis['tentativeDiag'] = " None ";
            $analysis['treatmentRec']='';
        }
        return $analysis;
    }

}