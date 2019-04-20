<?php

class createUserMock
{
    public function __construct()
    {

    }

    public function addDoctor($myusername, $lastname, $firstname,$passwd)
    {
        if ($this->checkCopy($doctorID, $lastname, $firstname, $diagnosis)) {
            return "Sorry that combination already exists";
        } else {
            return "Success!";
        }
    }

    public function addPatient($doctorID, $lastname, $firstname,$diagnosis)
    {
        if ($this->checkCopy($doctorID, $lastname, $firstname, $diagnosis)){
            return "Sorry that combination already exists";
        }else {
            return "Success!";
        }
    }

    public function checkCopy($doctorID, $lastname, $firstname, $diagnosis)
    {
	if($doctorID == 123 && $lastname == 'copy' && $firstname == 'copy' && $diagnosis == 'copy')
	{
		return true;
	}
	else
	{
		return false;
	}
    }

}
