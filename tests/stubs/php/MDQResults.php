<?php


class MDQResults
{
    public function __construct(){

    }

    public function getResults($q1, $q2, $q3){
        if($q1&&$q2&&$q3){
            $analysis['diagnosis'] = "Possible Bipolar I Disorder";
            $analysis['diagnosisHeader'] = "Diagnosis: ";
            $analysis['diagnosisInfo'] = 'The screen is positive for possible bipolar I disorder. Complete a clinical interview to make a diagnosis. This screen is not as sensitive for Bipolar II Disorder (depression and hypomania).';
        }else{
            $analysis['diagnosis'] = "None";
            $analysis['diagnosisInfo'] = '';
            $analysis['diagnosisHeader']="Diagnosis: ";
        }
        return $analysis;
    }
}