<?php
include 'session.php';

class depDiagLogic
{
    public function __construct(){

    }

    public function getAnswers($answers){
        $total=0;
        $answer['severityScore']=0;
        for ($i = 0; $i < 8; $i++){
            if($answers[$i]>1){
                $total++;
                $answer['severityScore']+=$answers[$i];
            }
        }
        if($answers[0]>1||$answers[1]>1){
            $answer['q1']=1;
        }else{
            $answer['q1']=0;
        }
        if($answers[8]>0){
            $answer['q9']=1;
            $total++;
        }else{
            $answer['q9']=0;
        }
        if($total>=5){
            $answer['q2']=1;
        }else{
            $answer['q2']=0;
        }
        if($answers['q10']>0){
            $answer['q3']=1;
        }else{
            $answer['q3']=0;
        }
    }

}