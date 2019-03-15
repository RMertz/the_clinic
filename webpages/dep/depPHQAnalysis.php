<?php
include('../php/session.php');
include('../php/scheduleVisit.php');
include ('../php/pHQAnalysis.php');

$error = " ";

echo $_POST['q1'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule($_POST['Date'])){
        $error = "Next Visit Added.";
    }else{
        $error="Next Visit Not Added, Please Select a Valid Date.";
    }
}


$PHQ = new pHQAnalysis($_GET['id']);
$analysis = $PHQ->getResults($_GET['type'],$_GET['q1'],$_GET['q2'],$_GET['q3'],$_GET['q9'],$_GET['total']);
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
    <div id="header">
        <div class="header">
            <div class=headerRow">
                <div class= "column left">
                    <h1>The Clinic</h1>
                </div>
                <div class= "column right">
                    <div id="headerLogo">
                        <img src="../images/longHeader.png" alt="HeaderImage">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navBar">
        <a href="../welcome.php">Home</a>
        <a href="../patientList.php">Your Patients</a>
        <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href=<?php echo "../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a href = "../php/logout.php?type=0">Sign Out</a>
    </div>

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
    </div>
</body>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>
</html>
