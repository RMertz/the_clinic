<?php
include('php/session.php');
$docID = $db->prepare("SELECT firstname FROM `Doctor Information` WHERE username = :user_check");
$docID->bindParam(":user_check", $user_check);
$docID->execute();
$row = $docID->fetch();
$login_session = $row['firstname'];
?>
<html>

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
</body>

</html>