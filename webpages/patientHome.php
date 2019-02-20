<?php
include('php/session.php');
$patients = $db->prepare( "SELECT * FROM `Patient Information` WHERE PatientID = :pat_ID");
$patients->bindParam(":pat_ID", $_GET['id']);
$patients->execute();
$patientInfo = $patients->fetch();
?>

<html>

<head>
    <title><?php
        echo $patientInfo['FirstName']." ".$patientInfo['LastName'];
        ?></title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
</head>

<body>
<div id="header">
    <h1>
        <br>
        <?php
            echo $patientInfo['FirstName']." ".$patientInfo['LastName'];
        ?>
    </h1>

    <div id="navBar">
        <a href="welcome.php">Home</a>
        <a href="patientList.php">Your Patients</a>
        <a href="dep/depHome.php">Depression Treatment</a>
        <a href = "php/logout.php">Sign Out</a>
    </div>
<div class="">
    <div class="content" >
        <h2 >
            Patient Info:
        </h2>
        <h3>
            Patient Name:
        </h3>
            <?php
                echo $patientInfo['FirstName']." ".$patientInfo['LastName'];
            ?>
        <h3>
            Patient Diagnosis:
        </h3>
        <?php
        echo $patientInfo['Diagnosis'];
        ?>
        <h3>
            Date of Last Visit:
        </h3>
        <?php
        echo $patientInfo['lastVisit'];
        ?>

        <ul id="oneFourth"

        </ul>
    </div>

</div>
</body>

<footer>
    <h4>
        <a href="https://github.com/RMertz/the_clinic">About This App</a>
    </h4>
</footer>

</html>

