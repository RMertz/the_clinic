<?php

// Initializing variables
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "demo";

$link = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
/* Include this code in any php using this file:
	<?php
		include_once 'includes/dbhandler.php';
	?> 
*/

// Check connection
if($link == false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*
//Attempt insert query execution
$sql = "INSERT INTO persons(FirstName, Surname)VALUES('Peter','Parker')";

if(mysqli_query($link, $sql)){
   echo "Records inserted successfully.";
} 

else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
*/
?>
