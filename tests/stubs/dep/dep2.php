<?php
require __DIR__ . "/scheduleVisitMock1.php";
class dep2
{
	public function __construct() 
	{

	}

	public function test($id)
	{
    		$schedule = new scheduleVisitMock1(2);
    		if($schedule->schedule($id)){
       			$error = "Next Visit Added.";
  		}else{
       			$error="Next Visit Not Added, Please Select a Valid Date.";
		}
		return $error;
	}
}
?>

