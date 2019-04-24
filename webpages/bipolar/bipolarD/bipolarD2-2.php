<?php
include('../../php/session.php');
include('../../php/scheduleVisit.php');
include('../../php/updateTreatmentPosition.php');
include('../../php/bipolarTreatmentHandler.php');
$update = new updateTreatmentPosition($_GET['id']);
$type = new bipolarTreatmentHandler($_GET['id']);
$update->updateStep(2,5);
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
        echo "Bipolar Depression Treatment Step 2";
        ?></title>
    <link rel="stylesheet" href="../../css/global.css" type="text/css">
    <link rel="stylesheet" href="../../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../../css/header.php');
include "../../css/bipolarNav.php";?>

<div class="row" >
    <h2 style="text-align: center">Bipolar Disorder Currently Depressed</h2>

    <div class="center">
        <h2 >
            Add OR switch to a stage 2 medication
        </h2>
        <h3>
            Stage 2 Medications:
        </h3>
        <ol>
            <li>Lithium (Eskalith®)</li>
            <li>Valproate (Depakote®)</li>
            <li>Lamotrigine (Lamictal®)</li>
            <li>Carbamazepine (Tegretol®)</li>
            <li>2nd Generation Antipsychotic</li>
        </ol>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            If partial or non-response after 4-6 weeks of therapy, move to the next stage of treatment.
        </p>
        <h3>
            <a href=<?php echo "bipolarD3.php?id=".$_GET['id'];?>>Next Step</a>
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
       if($type->getPrevType()==9){
           echo "bipolarD1-1.php?id=".$_GET['id'];
       }else if($type->getPrevType()==10){
           echo "bipolarD1-2.php?id=".$_GET['id'];
       }else if($type->getPrevType()==11){
           echo "bipolarD1-3.php?id=".$_GET['id'];
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