<?php
include('../php/session.php');
include('../php/scheduleVisit.php');
include ('../php/pHQAnalysis.php');
include ('../php/addDiagnosis.php');

$error = " ";
$diagError = " ";
$PHQ = new pHQAnalysis($_GET['id']);
$analysis = $PHQ->getResults($_GET['type'],$_GET['q1'],$_GET['q2'],$_GET['q3'],$_GET['q9'],$_GET['total']);

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



?>

<html>

<head>
    <title><?php
        echo "Depression PHQ";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/depNav.php";?>

    <div class="content" style="text-align: center">
        <h2>
        <?php echo $analysis['diagnosisHeader'].$analysis['diagnosis']?>
        </h2>
        <?php echo $analysis['diagnosisInfo']?>
        <h2>
            Treatment and Monitoring
        </h2>
        <ol class="center">
            <li><?php echo $analysis['treatmentTF']?></li>
            <li><?php echo $analysis['suicide']?></li>
            <li>
                <table class="center">
                    <tr>
                        <th style="width: 33.33%">Severity Score</th>
                        <th style="width: 33.33%">Tentative Diagnosis</th>
                        <th style="width: 33.33%">Treatment Recommendation</th>
                    </tr>
                    <tr>
                        <td><?php echo $_GET['total']?></td>
                        <td><?php echo $analysis['tentativeDiag']?></td>
                        <td>
                            <?php echo $analysis['treatmentRec']?>
                        </td>
                    </tr>
                </table>
            </li>
            <li>Monitoring – a change in the Severity Score of 5 or more is considered
                    clinically significant in assessing improvement of symptoms.</li>
        </ol>
        <div class="row">
            <?php include '../scheduleApp.php';?>
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
