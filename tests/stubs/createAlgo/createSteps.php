<?php
require __DIR__ . "/../php/showAlgoMock.php";
require __DIR__ . "/../php/createStepsMock.php";

class createSteps
{

	public function __construct()
	{

	}

	public function test(int $l1, int $l2, int $l3, int $l4)
	{
			
		$move = new createStepsMock();

		$show = new showAlgoMock();
		if($show->getDirections($l1, $l2, $l3, $l4) != ''){
    			$move->moveOn('firstSteps','level1','level2','level3','level4','name');
			return true;
		}
		return false;
	}
}
?>

