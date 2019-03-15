<?php
include('php/session.php');
$patients = $db->prepare( "SELECT * FROM `PatientInformation` WHERE PatientID = :pat_ID");
$patients->bindParam(":pat_ID", $_GET['id']);
$patients->execute();
$patientInfo = $patients->fetch();
?>

<html>

<head>
    <title><?php
        echo $patientInfo['FirstName']." ".$patientInfo['Surname'];
        ?></title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
</head>

<body>
    <div class="header">
        <div class=headerRow">
            <div class= "column left">
                <h1>The Clinic</h1>
            </div>
            <div class= "column right">
                <div id="headerLogo">
                    <img src="images/longHeader.png" alt="HeaderImage">
                </div>
            </div>
        </div>
    </div>

    <div class="navBar">
        <a href="welcome.php">Home</a>
        <a href="patientList.php">Your Patients</a>
        <a href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a href =<?php echo "dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href=<?php echo "medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a href = "php/logout.php">Sign Out</a>
        <div id="searchBar">
            <img src="images/searchBar.png" alt="Search Bar" border="0px" height= "20px" width= "150px">
        </div>
    </div>

    <div class="content" style="text-align: center">
        <h2 >
            Patient Info:
        </h2>
        <h3>
            Patient Name:
        </h3>
            <?php
                echo $patientInfo['FirstName']." ".$patientInfo['Surname'];
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
        echo $patientInfo['LastVisit'];
        ?>


    </div>

</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>

