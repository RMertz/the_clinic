<?php
include('php/session.php');
$docID = mysqli_query($db,"SELECT DoctorID FROM `Doctor Information` WHERE username = '$user_check'");
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
        Welcome <?php echo $login_session; ?>
    </h1>

    <div id="navBar">
        <a href="patientList.php">Your Patients</a>
        <a href = "php/logout.php">Sign Out</a>
    </div>

<h2><a href = "php/logout.php">Sign Out</a></h2>
</body>

</html>