<?php
require __DIR__ . "/../php/depDiagLogicMock.php";
class depDiag
{
	public function __construct()
	{

	}

	public function test($answers)
	{
		$diag = new depDiagLogicMock();
		$newAnswers = $diag->getAnswers($answers);
		return $newAnswers;
   	} 
}
?>
