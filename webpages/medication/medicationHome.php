<?php
include('../php/session.php');
?>
<html>

<head>
    <title><?php
        echo "Medication Home";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
</head>

<body>
<?php include('../css/header.php'); ?>

<div class="navBar">
    <a href="../welcome.php">Home</a>
    <a href="../patientList.php">Your Patients</a>
    <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a href=<?php echo "../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a href=<?php echo "../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
    <a href=<?php echo "medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "../php/logout.php">Sign Out</a>
</div>

<div class="content" style="text-align: center">
    <div class="row">
        <div class="column2">
            <h2>Prescribe Patent a Medication</h2><br/>
            <a href=<?php echo "prescribe.php?id=".$_GET['id'];?>>Prescribe Patent a Medication</a>
        </div>
        <div class="column2">
            <h2>Create a Medication</h2><br/>
            <a href=<?php echo "createAMedication.php?id=".$_GET['id'];?>>Create a Medication</a>
        </div>
    </div>
</div>
</body>
</html>