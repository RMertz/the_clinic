<?php
include('../php/session.php');
include('../php/medicationControl.php');
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = new medicationControl();
    $error = $update->createMedication($_POST['name'],$_POST['MinimumDosage'],$_POST['MaximumDosage'],$_POST['conflicts']);
};
?>
<html>

<head>
    <title><?php
        echo "Create a Medication";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/selectedPatientNav.php";?>

<div class="content" style="align-content: center">
    <div class="navigationBoxes">
        <div class= "loginBox">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px; text-align: center"><b>Create New Medication</b></div>

            <div style = "padding:30px; background-color: #dfdce3; ">

                <form action = "" method = "post">
                    <label>Medication Name :</label><input type = "text" name = "name" class = "box" required/><br /><br />
                    <label>Minimum Dose :</label><input type = "text" name = "MinimumDosage" class = "box" required/><br/><br />
                    <label>Maximum Dose :</label><input type = "text" name = "MaximumDosage" class = "box" required/><br /><br />
				
					<label>Select Any medication that conflicts with this medication:</label>

					<select name="conflicts[ ]" multiple>
						<?php
						$medications = $db->prepare("SELECT * FROM MedicationInformation");
						$medications->execute();
						foreach ($medications as $val){ 
							$medname = $val['Name'];
							$medID = $val['MedicationID'];
							?>
							<option value="<?php echo $medID; ?>"><?php echo $medname; ?> </option>
						<?php } ?>
					</select>

                    <input type = "submit" value = " Submit "/><br />
                </form>

                <div class="success" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>

        </div>
    </div>
</div>
</body>
</html>