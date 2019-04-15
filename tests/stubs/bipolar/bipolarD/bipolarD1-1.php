<?php
class bipolarD11
{
	function __construct()
	{

	}

public function test(): voide
	{
		$update = new updateTreatmentPosition($_GET['id']);
		$type = new bipolarTreatmentHandler($_GET['id']);
		$update->updateStep(2,2);
		$error = " ";
		$error2 ="";
		if($_SERVER["REQUEST_METHOD"] == "POST") {
    			$schedule = new scheduleVisit($_GET['id']);
    			if($schedule->schedule($_POST['Date'],0)){
        			$error = "Next Visit Added.";
    			}else{
        			$error="Next Visit Not Added, Please Select a Valid Date.";
    			}
		}
	}
}
?>
