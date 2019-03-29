<?php
include('../../php/session.php');
include('../../php/scheduleVisit.php');
include('../../php/updateTreatmentPosition.php');
$update = new updateTreatmentPosition($_GET['id']);
$update->updateStep(1,0);
$error = " ";
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
        echo "Bipolar Manic Treatment Home";
        ?></title>
    <link rel="stylesheet" href="../../css/global.css" type="text/css">
    <link rel="stylesheet" href="../../css/indexHome.css" type="text/css">
</head>

<body>
<?php include('../../css/header.php'); ?>

<div class="navBar">
    <a href="../../welcome.php">Home</a>
    <a href="../../patientList.php">Your Patients</a>
    <a href=<?php echo "../../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a href=<?php echo "../../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a href=<?php echo "../../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
    <a href=<?php echo "../bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a href=<?php echo "../bipolarMDQ.php?id=".$_GET['id'];?>>MDQ</a>
    <a href=<?php echo "../../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "../../php/logout.php?type=0">Sign Out</a>
</div>

<div class="row" >
    <h2 style="text-align: center">Bipolar Disorder Currently Hypomanic/Manic</h2>
    <div class="column2">
        <h2 >
            Euphoric/Irritable
        </h2>
        <p>
            Discontinue antidepressants<br> Start medication monotherapy*
        </p>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Provider Discretion
        </p>
        <h3>
            <a href=<?php $update->updatePrevStep(1,0); echo "bipolarM2.php?id=".$_GET['id'];?>>Next Step</a>
        </h3>
    </div>
    <div class="column2">
        <h2 >
            Mixed
        </h2>
        <p>
            Discontinue antidepressants<br> Start medication monotherapy* <br>(avoid lithium and quetiapine)
        </p>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Provider Discretion
        </p>
        <h3>
            <a href=<?php $update->updatePrevStep(1,0); echo "bipolarM2.php?id=".$_GET['id'];?>>Next Step</a>
        </h3>
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
    <a href=<?php echo "../bipolarHome.php?id=".$_GET['id'];?>>Back</a>
</h3>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>