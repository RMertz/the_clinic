<?php
include('../../php/session.php');
include('../../php/scheduleVisit.php');
include('../../php/updateTreatmentPosition.php');
include('../../php/bipolarTreatmentHandler.php');
$update = new updateTreatmentPosition($_GET['id']);
$type = new bipolarTreatmentHandler($_GET['id']);
$update->updateStep(1,2);
$error = " ";
$error2 ="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule($_POST['Date'],0)){
        $error = "Next Visit Added.";
    }else{
        $error="Next Visit Not Added, Please Select a Valid Date.";
    }
}
?>

<html>

<head>
    <title><?php
        echo "Bipolar Depression Treatment Step 1";
        ?></title>
    <link rel="stylesheet" href="../../css/global.css" type="text/css">
    <link rel="stylesheet" href="../../css/indexHome.css" type="text/css">
</head>

<body>
<<?php include('css/header.php'); ?>

<div class="navBar">
    <a href="../../welcome.php">Home</a>
    <a href="../../patientList.php">Your Patients</a>
    <a href=<?php echo "../../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a href=<?php echo "../../depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a href=<?php echo "../../depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
    <a href=<?php echo "../bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a href=<?php echo "../bipolarMDQ.php?id=".$_GET['id'];?>>MDQ</a>
    <a href=<?php echo "../../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a href = "../../php/logout.php?type=0">Sign Out</a>
</div>

<div class="row" >
    <h2 style="text-align: center">Bipolar Disorder Currently Depressed</h2>

    <div class="center">
        <h2 >
            Initial therapy with stage 1 medication
        </h2>
        <h3>
            Stage 1 Medications:
        </h3>
        <ol>
            <li>Lithium (Eskalith®)</li>
            <li>Quetiapine (Seroquel®)</li>
            <li>Lamotrigine (Lamictal®)</li>
        </ol>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Provider Discretion
        </p>
        <h3>
            <a href=<?php
            if($type->getPrevType()==8){
                echo "bipolarD2-1.php?id=".$_GET['id'];
            }else if($type->getPrevType()==9){
                echo "bipolarD2-2.php?id=".$_GET['id'];
            }else{
                $error2 = "Error go back to Treatment Home";
            }
            ?>>Next Step</a>
        </h3>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error2?></div>
    </div>

    <br/>
</div>
<div class="row">
    <div class="column2">
        <h3>Schedule Patient Visit</h3>
        <form action = "" method = "post">
            <input type = "date" name="Date" value = " Schedule Patient Visit "/><br/><br/>
            <input type = "submit" name="Schedule" value = " Schedule Patient "/>
        </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </div>
    <div class="column2">
        <h3>Prescribe Patient a Medication</h3>
        <a href=<?php echo "../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
    </div>
</div>
<h3>
    <a href=<?php echo "bipolarDHome.php?id=".$_GET['id'];?>>Back</a>
</h3>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>