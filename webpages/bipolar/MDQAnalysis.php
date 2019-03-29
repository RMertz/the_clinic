<?php
include('../php/session.php');
include('../php/scheduleVisit.php');
include ('../php/MDQResults.php');
include ('../php/addDiagnosis.php');

$error = " ";
$diagError = " ";
$PHQ = new MDQResults();
$analysis = $PHQ->getResults($_GET['q1'],$_GET['q2'],$_GET['q3']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Schedule'])){
        $schedule = new scheduleVisit($_GET['id']);
        if($schedule->schedule($_POST['Date'],0)){
            $error = "Next Visit Added.";
        }else{
            $error="Next Visit Not Added, Please Select a Valid Date.";
        }
    }
    if (isset($_POST['Diagnosis'])){
        $diag = new addDiagnosis();
        $diagError = $diag->addDiagnosisToPatient($_GET['id'],$analysis['diagnosis']);

    }
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<html>

<head>
    <title><?php
        echo "Depression PHQ";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
</head>

<body>
<?php include('css/header.php'); ?>

<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
    <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a class="<?= ($activePage == 'depDiag') ? 'active':''; ?>" href=<?php echo "bipolarMDQ.php?id=".$_GET['id'];?>>Bipolar MDQ</a>
    <a ID="logoutButton"href = "../php/logout.php">Sign Out</a>
</div>

<div class="content" style="text-align: center">
    <h2>
        <?php echo $analysis['diagnosisHeader'].$analysis['diagnosis']?>
    </h2>
    <?php echo $analysis['diagnosisInfo']?>
    <h2>
        Monitoring
    </h2>
    <ul class="center">
        <li>Monitor patients every 1-2 weeks for 6 weeks when starting new medications or switching therapies</li>
        <li>Once stabilized, monitor patient every month for 3 months, then every 2-3 months</li>
        <li>Monitor for depression using Depression PHQ</li>
        <li>Continually assess suicidality</li>
        <li>Monitor medication adherence as this may be a reason for
            non-response and recurrent episodes</li>
    </ul>
    <div class="row">
        <div class="column3">
            <h3>Schedule Patient Visit</h3>
            <form action = "" method = "post">
                <input type = "date" name="Date" value = " Schedule Patient Visit "/><br/><br/>
                <input type = "submit" name="Schedule" value = " Schedule Patient "/>
            </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </div>
        <div class="column3">
            <form action = "" method = "post">
                <input type = "submit" name="Diagnosis" value = " Approve Diagnosis "/>
            </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $diagError; ?></div>
        </div>
        <div class="column3">
            <h3>Prescribe Patient a Medication</h3>
            <a href=<?php echo "../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
        </div>
    </div>
</div>
</body>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>
</html>

