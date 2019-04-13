<?php


class showAlgo
{

    private $name;
    private $json;

    public function __construct($name,$json){
        $this->name = $name;
        $this->json = $json;
    }

    public function getStep($l1,$l2,$l3,$l4){
        if($l2==0&&$l3==0&&$l4==0){
            return 1;
        }else if($l3==0&&$l4==0){
            return 2;
        }else if($l4==0){
            return 3;
        }else{
            return 4;
        }
    }

    public function getNextStep($l2,$l3,$l4,$type){
        if($l2>0&&$l3>0){
            return "&level2=".$l2."&level3=".$l3."&level4=".$type;
        }else if($l2>0){
            return "&level2=".$l2."&level3=".$type."&level4=0";
        }else if($l2==0){
            return "&level2=".$type."&level3=0&level4=0";
        }else{
            return "&level2=".$l2."&level3=".$l3."&level4=".$l4;
        }
    }

    public function getDirections($l1,$l2,$l3,$l4){
        if ($l2 > 0 && $l3 > 0 && $l4 > 0) {
            $directions = $this->json['option' . $l2]['option' . $l3]['option' . $l4]['directions'];
        } else if ($l2 > 0 && $l3 > 0) {
            $directions = $this->json['option' . $l2]['option' . $l3]['directions'];
        } else if ($l2 > 0) {
            $directions = $this->json['option' . $l2]['directions'];
        } else if ($l2 == 0) {
            $directions = $this->json['directions'];
        }
        return $directions;
    }

    public function getReasons($l1,$l2,$l3){
        $reasons = array();
        if ($l2 > 0 && $l3 > 0) {
            for ($l4 =1; $l4<=3;$l4++) {
                $reasons['reason'.$l4] = $this->json['option' . $l2]['option' . $l3]['option' . $l4]['reason'];
            }
        } else if ($l2 > 0) {
            for ($l4 =1; $l4<=3;$l4++) {
                $reasons['reason'.$l4] = $this->json['option' . $l2]['option' . $l4]['reason'];
            }
        } else if ($l2 == 0) {
            for ($l4 =1; $l4<=3;$l4++) {
                $reasons['reason'.$l4] = $this->json['option' . $l4]['reason'];
            }
        }
        return $reasons;

    }

    public function getReasonForEdit($l2,$l3,$l4){

        if ($l2 > 0 && $l3 > 0 && $l4>0) {
            $reason = $this->json['option' . $l2]['option' . $l3]['option' . $l4]['reason'];
        } else if ($l2 > 0&& $l3 > 0) {

                $reason = $this->json['option' . $l2]['option' . $l3]['reason'];

        } else if ($l2 > 0) {

                $reason = $this->json['option' . $l2]['reason'];

        }
        return $reason;

    }

    public function getReEval($l1,$l2,$l3,$l4){
        if ($l2 > 0 && $l3 > 0 && $l4 > 0) {
            $directions = $this->json['option' . $l2]['option' . $l3]['option' . $l4]['re-eval'];
        } else if ($l2 > 0 && $l3 > 0) {
            $directions = $this->json['option' . $l2]['option' . $l3]['re-eval'];
        } else if ($l2 > 0) {
            $directions = $this->json['option' . $l2]['re-eval'];
        } else if ($l2 == 0) {
            $directions = $this->json['re-eval'];
        }
        return $directions;
    }


}