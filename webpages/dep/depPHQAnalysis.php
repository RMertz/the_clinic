<?php
include('../php/session.php');
$diagnosis='';
$diagnosisInfo='';
$treatmentTF='';
$suicide='';
$diagnosisHeader="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['Schedule'])){

    }

}

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
was rated a 2 or 3 OR question 10 was rated at least Somewhat difficult.";
}else{
    $treatmentTF=$treatmentType." may NOT be warranted because none of the first two questions
was rated a 2 or 3 OR question 10 was rated Somewhat difficult or above.";
}
if($_GET['q9']>0){
    $suicide="Due to positive answer to question 9 it is recommenced that the patient is assessed for suicide risk.";
}else{
    $suicide="Due to negative answer to question 9 it is NOT recommenced that the patient is assessed for suicide risk.";
}
if($_GET['total']>=5 && $_GET['total']<10){
    $tentativeDiag = " Minimal Symptoms ";
    $treatmentRec = "Support, ask to call if worse, return in 1 month";
}else if($_GET['total']>=10 && $_GET['total']<15){
    $tentativeDiag = " Minor Depression Dysthymia or Major Depression, Mild ";
    $treatmentRec = "Support, contact in one week. Antidepressant or psychotherapy,
contact in one week";
}else if($_GET['total']>=15 && $_GET['total']<20){
    $tentativeDiag = " Major Depression, Moderate ";
    $treatmentRec = "Antidepressant or psychotherapy";
}else if($_GET['total']>=20){
    $tentativeDiag = " Major Depression, Severe ";
    $treatmentRec = "Antidepressant and psychotherapy (especially if not improved on monotherapy)";
}else{
    $tentativeDiag = " None ";
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
        <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href=<?php echo "../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="content" style="text-align: center">
        <h2>
        <?php echo $diagnosisHeader.$diagnosis?>
        </h2>
        <?php echo $diagnosisInfo?>
        <h2>
            Treatment and Monitoring
        </h2>
        <ol class="center">
            <li><?php echo $treatmentTF?></li>
            <li><?php echo $suicide?></li>
            <li>
                <table class="center">
                    <tr>
                        <th style="width: 33.33%">Severity Score</th>
                        <th style="width: 33.33%">Tentative Diagnosis</th>
                        <th style="width: 33.33%">Treatment Recommendation</th>
                    </tr>
                    <tr>
                        <td><?php echo $_GET['total']?></td>
                        <td><?php echo $tentativeDiag?></td>
                        <td>
                            <?php echo $treatmentRec?>
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
