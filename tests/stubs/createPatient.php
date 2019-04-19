<?php
include "php/createUserMock.php";

class createPatient
{

	public function __construct()
	{
	
	}

	public function test($doc_ID, $lastname, $firstname, $diagnosis)
	{
    		$newUser = new createUserMock();
    		$error= $newUser->addPatient($doc_ID,$lastname,$firstname,$diagnosis);
		return $error;
	}

}
?>
