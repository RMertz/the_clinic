<?php
include_once ("../php/session.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create New Treatment Algorithm Steps</title>

    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Bootstrap library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.0/mustache.js"></script>
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<link rel="icon" type="image/png" href="../images/favicon.ico">

<body>
<?php include('../css/header.php'); ?>

<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
    <a class="<?= ($activePage == 'createAlgo') ? 'active':''; ?>" href="createAlgo.php">Create an Algorithm</a>
    <a id="logoutButton" href = "../php/logout.php">Sign Out</a>
</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <h2>Thanks for making an Algorithm!</h2>
            </div>
        </div>
    </div>
</div>
</body>
</html>