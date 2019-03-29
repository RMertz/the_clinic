<?php
include('../../php/session.php');
include('../../php/scheduleVisit.php');
include('../../php/updateTreatmentPosition.php');
$update = new updateTreatmentPosition($_GET['id']);
$update->updateStep(2,0);
$error = " ";
$error2 = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Schedule'])) {
        $schedule = new scheduleVisit($_GET['id']);
        if ($schedule->schedule($_POST['Date'], 0)) {
            $error = "Next Visit Added.";
        } else {
            $error = "Next Visit Not Added, Please Select a Valid Date.";
        }
    }else if(isset($_POST['DepD1'])){
        $update->updatePrevStep(2,8);
        header("Location: bipolarD1-1.php?id=".$_GET['id']);
    }else if(isset($_POST['DepD2'])){
        $update->updatePrevStep(2,9);
        header("Location: bipolarD1-1.php?id=".$_GET['id']);
    }else if(isset($_POST['DepD3'])){
        $update->updatePrevStep(2,10);
        header("Location: bipolarD1-2.php?id=".$_GET['id']);
    }else if(isset($_POST['DepD4'])){
        $update->updatePrevStep(2,11);
        header("Location: bipolarD1-3.php?id=".$_GET['id']);
    }else{
        $error2 = "Error Try Again";
    }
}
?>

<html>

<head>
    <title><?php echo "Bipolar Depression Treatment Home"; ?></title>
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
    <a href = "../../php/logout.php?type=0">Sign Out</a>
</div>

<div class="row" >
    <h2 style="text-align: center">Bipolar Disorder Currently Depressed</h2>
    <div class="column4">
        <h2 >
            Not taking antimanic with NO history of severe and/or recent mania
        </h2>
        <form action = "" method = "post">
            <input type = "submit" class= "submit" name ="DepD1" value = " Begin Treatment "/><br />
        </form>
    </div>
    <div class="column4">
        <h2 >
            Not taking antimanic with history of severe and/or recent mania<br>-
        </h2>
        <form action = "" method = "post">
            <input type = "submit" class= "submit" name ="DepD2" value = " Begin Treatment "/><br />
        </form>
    </div>
    <div class="column4">
        <h2 >
            Taking antimanic other than lithium<br>-
        </h2>
        <form action = "" method = "post">
            <input type = "submit" class= "submit" name ="DepD3" value = " Begin Treatment "/><br />
        </form>
    </div>
    <div class="column4">
        <h2 >
            Taking lithium<br><br>-
        </h2>
        <form action = "" method = "post">
            <input type = "submit" class= "submit" name ="DepD4" value = " Begin Treatment "/><br />
        </form>
    </div>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error2; ?></div>
</div>
<div class="row">
    <?php include '../../scheduleApp.php';?>
    <div class="column2">
        <h3>Prescribe Patient a Medication</h3>
        <a href=<?php echo "../../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
    </div>
</div>
<h3>
    <a href=<?php echo "dep2.php?id=".$_GET['id'];?>>Back</a>
</h3>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>