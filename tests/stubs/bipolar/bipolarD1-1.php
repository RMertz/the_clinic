<?php
include('scheduleVisitMock.php');
class bipolarD11
{
	function __construct()
	{

	}

public function test($date)
	{
		$schedule = new scheduleVisitMock(1);
    		if($schedule->schedule($date)){
        		$error = "Next Visit Added.";
  		}else{
       			$error="Next Visit Not Added, Please Select a Valid Date.";
		}
		return $error;
	}
}
?>
