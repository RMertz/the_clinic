<?php
include('php/session.php');
include('php/scheduleVisit.php');
$patients = $db->prepare( "SELECT * FROM `PatientInformation` WHERE PatientID = :pat_ID");
$patients->bindParam(":pat_ID", $_GET['id']);
$patients->execute();
$patientInfo = $patients->fetch();
$medication = $db->prepare("SELECT * FROM `Prescription`
        LEFT JOIN `MedicationInformation` ON `MedicationInformation`.`MedicationID`=`Prescription`.`MedicationID`
                AND `Prescription`.`PatientID` = :pat_ID");
$medication->bindParam(":pat_ID", $_GET['id']);
$medication->execute();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule(date("Y-m-d"),1)){
        $error = "Patient Checked In";
    }else{
        $error="Patient NOT Checked In";
    }
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<html>

<head>
    <title><?php
        echo $patientInfo['FirstName']." ".$patientInfo['Surname'];
        ?></title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('css/header.php');
include "css/selectedPatientNav.php"?>


    <div class="content" style="text-align: center">
        <h2>
            Check Patient In:
        </h2>
        <form method="post">
            <input class="checkIn" type = "submit" name="Schedule" value = " Check Patient In "/>
        </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
        <h2 >
            Patient Info:
        </h2>
        <h3>
            Patient Name:
        </h3>
            <?php echo $patientInfo['FirstName']." ".$patientInfo['Surname']; ?>
        <h3>
            Patient Diagnosis:
        </h3>
        <?php echo $patientInfo['Diagnosis']; ?>
        <h3>
            Current Medication:
        </h3>
		<?php
        $num =0;
		foreach($medication as $val){
            if($val['Name']==""){
                if($num == 0){
                    echo "None";
                }
                break;
            }else{
                echo $val['Name'].": ".$val['CurrentDosage']."<br>";
                $num++;
            }
		}
		?>
        <h3>
            Date of Last Visit:
        </h3>
        <?php
            if($patientInfo['LastVisit']==""){
                echo "First Visit!"."<br>"." (Make sure to check this patient in)";
            }else{echo $patientInfo['LastVisit'];}
        ?>
        <h3>
        Date of Next Visit:
        </h3>
        <?php
        if($patientInfo['NextVisit']<date("Y-m-d")){
            echo "No visit scheduled";
        }else{echo $patientInfo['NextVisit'];} ?>
        <br><br/>


    </div>

</body>

<div class="footer">

    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>



