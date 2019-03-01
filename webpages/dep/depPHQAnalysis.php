<?php
include('../php/session.php');
$diagnosis='';
$diagnosisInfo='';
$treatmentTF='';
$suicide='';
$diagnosisHeader="";
if($_GET['type']==0){
    if($_GET['q1']==1&&$_GET['q2']==1&&$_GET['q3']==1) {
        $diagnosis = "Depression";
        $diagnosisHeader="Diagnosis: ";
        $diagnosisInfo = "Due to your patients responses from the PHQ we recommend making a tentative diagnosis of ".$diagnosis." after ruling out physical causes,
         normal bereavement and a history of manic or hypomanic episode.";
        $treatmentType="Treatment";
    }else{
        $diagnosis = "None";
        $treatmentType="Treatment";
        $diagnosisHeader="Diagnosis: ";
    }
}else{
    $treatmentType="A Treatment change";
}
if($_GET['q1']==1||$_GET['q3']==1){
    $treatmentTF=$treatmentType." may be warranted because at least one of the first two questions
was rated a 2 or 3 OR question 10 was rated at least Somewhat difficult";
}
if($_GET['q9']>0){
    $suicide="Due to positive answer to question 9 it is recommenced that the patient is assessed for suicide risk.";
}else{
    $suicide="Due to negative answer to question 9 it is NOT recommenced that the patient is assessed for suicide risk.";
}

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
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="content" >
        <h2>
        <?php echo $diagnosisHeader.$diagnosis?>
        </h2>
        <?php echo $diagnosisInfo?>
        <h2>
            Treatment and Monitoring
        </h2>
        <ol>
            <li><?php echo $treatmentTF?></li>
            <li><?php echo $suicide?></li>
            <li>
                <table>
                    <tr>
                        <th style="width: 33.33%">Severity Score</th>
                        <th style="width: 33.33%">Tentative Diagnosis</th>
                        <th style="width: 33.33%">Treatment Recommendation</th>
                    </tr>
                    <tr>

                    </tr>
                </table>
            </li>
        </ol>
    </div>
</body>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>
</html>
