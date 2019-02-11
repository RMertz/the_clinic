<?php
include('php/session.php');
$sql = "SELECT DoctorID FROM Doctor Information WHERE username = '$myusername' and password = '$mypassword'";
?>
<html">

<head>
    <title>Welcome </title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
</head>

<body>
<div id="header">
    <h1>
        <br>
        <img src="images/hospitalLogo.jpg" alt="Hospital Logo" >
        Help
    </h1>

    <div id="navBar">
        <a href="index.html">HOME PAGE</a>
        <a href="profile.html">PROFILE</a>
        <a href="patientPage.html">PATIENTS</a>
        <a href="help.html">HELP</a>
    </div>
<h1>Welcome <?php echo $login_session; ?></h1>
<h2><a href = "php/logout.php">Sign Out</a></h2>
</body>

</html>