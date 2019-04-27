<?php

class createUserMock1
{
    public function __construct()
    {

    }

    public function addDoctor($username, $lastname, $firstname,$passwd)
    {
        if ($this->checkCopyDoc($username, $lastname, $firstname, $passwd)) {
            return "Sorry that combination already exists";
        } else {
            return "Success!";
        }
    }

    public function addPatient($doctorID, $lastname, $firstname,$diagnosis)
    {
        if ($this->checkCopyPat($doctorID, $lastname, $firstname, $diagnosis)){
            return "Sorry that combination already exists";
        }else {
            return "Success!";
        }
    }

    public function checkCopyPat($doctorID, $lastname, $firstname, $diagnosis)
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

    public function checkCopyDoc($username, $lastname, $firstname, $passwd)
    {
        if($username == 'copy' && $lastname == 'copy' && $firstname == 'copy' && $passwd == 'copy')
        {
                return true;
        }
        else
        {
                return false;
        }
    }


}
