<?php


class createSteps
{
    public function __construct(){

    }

    public function moveOn($firstSteps,$level1,$level2,$level3,$level4,$name){
        if($level2==0&&$level3==0&&$level4==0){
            header("location: done.php");
        }
        if($firstSteps!=0) {
            if ($level3 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . $level2 . "&level3=" . $level3 . "&level4=".$firstSteps);
            } else if ($level2 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . $level2 . "&level3=". $firstSteps . "&level4=0");
            } else if ($level1 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=". $firstSteps . "&level3=0" . "&level4=0");
            } else {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . $level2 . "&level3=" . $level3 . "&level4=" . ($level4 - 1));
            }
        }else {
            if($level4 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . $level2 . "&level3=" . $level3 . "&level4=" . ($level4 - 1));
            } else if ($level3 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . $level2 . "&level3=" . ($level3 - 1) . "&level4=0");
            } else if ($level2 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . $level1 . "&level2=" . ($level2 - 1) . "&level3=0" . "&level4=0");
            } else if ($level1 != 0) {
                header("location: createSteps.php?name=" . $name . "&level1=" . ($level1 - 1) . "&level2=0" . "&level3=0" . "&level4=0");
            } else {

            }
        }
    }

}