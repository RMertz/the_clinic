<?php

class bipolarTreatmentHandler
{

    public function __construct()
    {
    }

    public function checkTreatment($type){

        $treatmentOptions = array();

        $treatmentOptions['biD']=' Bipolar-Depression ';
        $treatmentOptions['biM']=' Bipolar-Manic ';

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
        }
    }
}
