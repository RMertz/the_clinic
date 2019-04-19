<?php
require __DIR__ . "/php/createUserMock1.php";
class createUser
{
	public function __construct()
	{

	}

	public function test($username, $lastname, $firstname, $passwd)
	{
    		$newUser = new createUserMock1();
    		$error= $newUser->addDoctor($username,$lastname,$firstname,$passwd);
		return $error;
	}
}
?>

