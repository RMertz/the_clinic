<?php

class login
{
	public function __construct()
	{

	}

	public function test($username, $password)
	{
    		if($this->rowCount($username, $password)) {
			$error = "You are logged in";
		}else {
        		$error = "Your Login Name or Password is invalid";
    		}
		return $error;
	}

	public function rowCount($username, $password)
	{
		if($username == 'username' && $password == 'password')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>
