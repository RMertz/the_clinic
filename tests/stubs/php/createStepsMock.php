<?php


class createStepsMock
{
    public function __construct(){

    }

    public function moveOn($firstSteps,$level1,$level2,$level3,$level4,$name){
    
    }

    public function updateJson($json,$edit,$firstSteps,$level2,$level3,$level4,$step1,$step2,$step3,$directions,$reEval){
        switch ($firstSteps) {
            case 1:
                $json = $edit->modifyReason($json,$level2,$level3,1,$step1);
                break;
            case 2:
                $json = $edit->modifyReason($json,$level2,$level3,1,$step1);
                $json = $edit->modifyReason($json,$level2,$level3,2,$step2);
                break;
            case 3:
                $json = $edit->modifyReason($json,$level2,$level3,1,$step1);
                $json = $edit->modifyReason($json,$level2,$level3,2,$step2);
                $json = $edit->modifyReason($json,$level2,$level3,3,$step3);
                break;
            default:
                $json = $edit->modifyDirections($json, $level2, $level3, $level4, $directions, $reEval);
                break;
        }
        return $json;
    }

}
