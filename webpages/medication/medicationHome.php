<?php
include('../php/session.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<html>

<head>
    <title><?php
        echo "Medication Home";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php'); ?>

<div class="navBar">


    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
    <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a class="<?= ($activePage == 'bipolarHome') ? 'active':''; ?>" href=<?php echo "bipolar/bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a class="<?= ($activePage == 'selectAlgo') ? 'active':''; ?>" href=<?php echo "selectAlgo.php?id=".$_GET['id']."&level1=1&level2=0&level3=0&level4=0"?>>Select Algorithm</a>
    <a class="<?= ($activePage == 'medicationHome') ? 'active':''; ?>"href=<?php echo "medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "../php/logout.php">Sign Out</a>
</div>

<div class="content" style="text-align: center">
    <div class="row">
        <div class="column2">
            <h2>Prescribe Patient a Medication</h2><br/>
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
