<?php
include 'session.php';

class depDiagLogic
{
    public function __construct(){

    }

    public function getAnswers($answers){
        $total=0;
        $newAnswers = array();
        $newAnswers['severityScore']=0;
        for ($i = 0; $i < 8; $i++){
            if($answers[$i]>1){
                $total++;
                $newAnswers['severityScore']+=$answers[$i];
            }
        }
        if($answers[0]>1||$answers[1]>1){
            $newAnswers['q1']=1;
        }else{
            $newAnswers['q1']=0;
        }
        if($answers[8]>0){
            $newAnswers['q9']=1;
            $total++;
        }else{
            $newAnswers['q9']=0;
        }
        if($total>=5){
            $newAnswers['q2']=1;
        }else{
            $newAnswers['q2']=0;
        }
        if($answers[9]>0){
            $newAnswers['q3']=1;
        }else{
            $newAnswers['q3']=0;
        }
        return$newAnswers;
    }

}