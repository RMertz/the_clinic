<?php
if((include $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/php/Config.php")){
 }else{
    echo "nooo";
};
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    session_start();
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $doctor = $db->prepare("SELECT DoctorID, Username FROM `DoctorInformation` WHERE Password = :passwd and Username = :username");
    $doctor->bindParam(":passwd", $mypassword);
    $doctor->bindParam(":username", $myusername);
    $doctor->execute();
    // If result matched $myusername and $mypassword, table row must be 1 row

    if($doctor->rowCount() == 1) {
        $_SESSION['login_user'] = $myusername;
        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>


<?php include('css/header.php'); ?>



<div class="navBar">

    <a href="index.html">HOME PAGE</a>
    <a href="profile.html">PROFILE</a>
    <a href="patientPage.html">PATIENTS</a>
    <a href="help.html">HELP</a>
    <!--<a id="logoutButton" href="Login.php">LOGIN</a>-->
    <a id ="createUserButton"href="createUser.php">CREATE USER</a>
</div>

<div class = "content" >

	<div class="redBack">
		<div class="navigationBoxes">
			<div class= "loginBox">
				<div class="loginLabel" ><b>Login</b></div>

				<div>

					<form action = "" method = "post">
						<label>UserName :</label><input class="loginField" type = "text" name = "username" class = "box"/><br /><br />
						<label>Password	:</label><input class="loginField" type = "password" name = "password" class = "box" /><br/><br />
						<input class="submitLogin" type = "submit" value = " Submit "/><br />
					</form>

					<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

				</div>

			</div>
		</div>
	</div>
</div>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</body>
</html>