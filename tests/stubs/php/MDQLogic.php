<?php


class MDQLogic
{
    public function __construct(){

    }

    public function getAnswers($answers){
        $total=0;
        $newAnswers = array();
        for ($i = 0; $i < 13; $i++){
            if($answers[$i]>0){
                $total++;
            }
        }
        if($total>=7) {
            $newAnswers['total'] = true;
        }else{
		$newAnswers['total'] = false;
        }
        if($answers[13]==1){
            $newAnswers['q2'] = true;
        }else{
            $newAnswers['q2'] = false;
        }
        if($answers[14]>1){
            $newAnswers['q3'] = true;
        }else{
            $newAnswers['q3'] = false;
        }
        return $newAnswers;
    }

}
