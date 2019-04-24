<?php
include('../php/session.php');
include('../php/medicationControl.php');
$medications = $db->prepare("SELECT * FROM MedicationInformation WHERE MedicationID = :medid");
$medications->bindParam(":medid", $_GET['medid']);
$medications->execute();
$row = $medications->fetch();
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = new medicationControl();
	$conflict = $update->checkConflict($_GET['id'],$_GET['medid']);
	if ($conflict>0){
		$error = "Error: Medication conflicts with current prescription";
    }
    else{
		$error = $update->setDose($_GET['id'],$_GET['medid'],$_POST['dose']);
	}
};
?>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title><?php
        echo "Prescribe Patent Medication";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/selectedPatientNav.php";?>

    <div class="row">
        <div class="column2" >
            <h2>Medication Info</h2>
            <p>Name: <?php echo $row['Name']?></p>
            <p> Minimum Dose: <?php echo $row['MinimumDosage']?></p>
            <p>  Maximum Dose: <?php echo $row['MaximumDosage']?></p>
        </div>
        <div class="column2"
            <div class= "loginBox">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Prescribe This Medication</b></div>
                    <div style = "padding:30px; background-color: #dfdce3; ">
                        <form action = "" method = "post">
                            <h3><?php echo $row['Name']?></h3>
                            <label>Dose :</label><input type = "text" name = "dose" class = "box" required/><br /><br />
                            <input type = "submit" value = " Submit "/><br />
                        </form>
                        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
