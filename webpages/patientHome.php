<?php
include('php/session.php');
include('php/scheduleVisit.php');
$patients = $db->prepare( "SELECT * FROM `PatientInformation` WHERE PatientID = :pat_ID");
$patients->bindParam(":pat_ID", $_GET['id']);
$patients->execute();
$patientInfo = $patients->fetch();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule(date("Y-m-d"),1)){
        $error = "Patient Checked In";
    }else{
        $error="Patient NOT Checked In";
    }
}
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
        <a href = "php/logout.php?type=0">Sign Out</a>
        <div id="searchBar">
            <img src="images/searchBar.png" alt="Search Bar" border="0px" height= "20px" width= "150px">
        </div>
    </div>

    <div class="content" style="text-align: center">
        <h2>
            Check Patient In:
        </h2>
        <form method="post">
            <input type = "submit" name="Schedule" value = " Check Patient In "/>
        </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
        <h2 >
            Patient Info:
        </h2>
        <h3>
            Patient Name:
        </h3>
            <?php echo $patientInfo['FirstName']." ".$patientInfo['Surname']; ?>
        <h3>
            Patient Diagnosis:
        </h3>
        <?php echo $patientInfo['Diagnosis']; ?>
        <h3>
            Date of Last Visit:
        </h3>
        <?php echo $patientInfo['LastVisit']; ?>
        <h3>
        Date of Next Visit:
        </h3>
        <?php echo $patientInfo['NextVisit']; ?>


    </div>

</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>

