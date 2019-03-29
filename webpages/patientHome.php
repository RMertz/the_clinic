<?php
include('php/session.php');
include('php/scheduleVisit.php');
$patients = $db->prepare( "SELECT * FROM `PatientInformation` WHERE PatientID = :pat_ID");
$patients->bindParam(":pat_ID", $_GET['id']);
$patients->execute();
$patientInfo = $patients->fetch();
$medication = $db->prepare( "SELECT `Name` FROM `MedicationInformation` WHERE MedicationID = :med_ID");
$medication->bindParam(":med_ID", $patientInfo['MedicationID']);
$medication->execute();
$medicationInfo = $medication->fetch();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule(date("Y-m-d"),1)){
        $error = "Patient Checked In";
    }else{
        $error="Patient NOT Checked In";
    }
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
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
<?php include('css/header.php'); ?>

    <div class="navBar">
        <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="welcome.php">Home</a>
        <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="patientList.php">Your Patients</a>
        <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a class="<?= ($activePage == 'bipolarHome') ? 'active':''; ?>" href=<?php echo "bipolar/bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
        <a href=<?php echo "medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a ID="logoutButton"href = "php/logout.php">Sign Out</a>
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
            Current Medication:
        </h3>
        <?php echo $medicationInfo['Name']; ?>
        <h3>
            Current Dose:
        </h3>
        <?php echo $patientInfo['CurrentDose']; ?>
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



