<?php
require __DIR__ . "/pHQAnalysisMock.php";
class depPHQAnalysis
{
	public function __construct()
	{

	}

	public function test($type, $q1, $q2, $q3, $q9, $total)
	{
		$PHQ = new pHQAnalysisMock();
		$analysis = $PHQ->getResults($type, $q1, $q2, $q3, $q9, $total);
		return $analysis;
	}
}
