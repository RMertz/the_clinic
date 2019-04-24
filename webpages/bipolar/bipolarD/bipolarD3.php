<?php
include('../../php/session.php');
include('../../php/scheduleVisit.php');
include('../../php/updateTreatmentPosition.php');
include('../../php/bipolarTreatmentHandler.php');
$update = new updateTreatmentPosition($_GET['id']);
$type = new bipolarTreatmentHandler($_GET['id']);
$update->updateStep(2,6);
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
        echo "Bipolar Depression Treatment Step 3";
        ?></title>
    <link rel="stylesheet" href="../../css/global.css" type="text/css">
    <link rel="stylesheet" href="../../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<<?php include('../../css/header.php'); ?>

<div class="navBar">
    <a href="../../welcome.php">Home</a>
    <a href="../../patientList.php">Your Patients</a>
    <a href=<?php echo "../../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a href=<?php echo "../../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a href=<?php echo "../../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
    <a href=<?php echo "../bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a href=<?php echo "../bipolarMDQ.php?id=".$_GET['id'];?>>MDQ</a>
    <a href=<?php echo "../../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "../../php/logout.php?type=0">Sign Out</a></div>

<div class="row" >
    <h2 style="text-align: center">Bipolar Disorder Currently Depressed</h2>

    <div class="center">
        <h2 >
            Quetiapine or olanzapine-fluoxetine combination if not previously used (if not currently on an antipsychotic)<br> OR<br> add an antidepressant (do not use 2 antidepressants)
        </h2>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            If partial or non-response after 4-6 weeks of therapy, move to the next stage of treatment.
        </p>
        <h3>
            <a href=<?php echo "bipolarD4.php?id=".$_GET['id'];?>>Next Step</a>
        </h3>
    </div>

    <br/>
</div>
<div class="row">
    <?php include '../../scheduleApp.php';?>
    <div class="column2">
        <h3>Prescribe Patient a Medication</h3>
        <a href=<?php echo "../../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
    </div>
</div>
<h3>
    <a href=
       <?php
            if($type->getPrevType()==8){
                echo "bipolarD2-1.php?id=".$_GET['id'];
            }else if($type->getPrevType()==9||$type->getPrevType()==10||$type->getPrevType()==11){
                echo "bipolarD2-2.php?id=".$_GET['id'];
            }else{
                $error2 = "Error go back to Treatment Home";
            }
        ?>
    >Back</a>
</h3>
<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error2?></div>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>