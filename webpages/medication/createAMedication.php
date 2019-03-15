<?php
include('../php/session.php');
include('../php/medicationControl.php');
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = new medicationControl();
    $error = $update->createMedication($_POST['name'],$_POST['MinimumDosage'],$_POST['MaximumDosage']);
};
?>
<html>

<head>
    <title><?php
        echo "Create a Medication";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
</head>

<body>
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

<div class="navBar">
    <a href="../welcome.php">Home</a>
    <a href="../patientList.php">Your Patients</a>
    <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a href=<?php echo "../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a href=<?php echo "../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
    <a href=<?php echo "medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a href = "../php/logout.php">Sign Out</a>
</div>

<div class="content" style="align-content: center">
    <div class="navigationBoxes">
        <div class= "loginBox">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px; text-align: center"><b>Create New Medication</b></div>

            <div style = "padding:30px; background-color: #dfdce3; ">

                <form action = "" method = "post">
                    <label>Medication Name :</label><input type = "text" name = "name" class = "box" required/><br /><br />
                    <label>Minimum Dose :</label><input type = "text" name = "MinimumDosage" class = "box" required/><br/><br />
                    <label>Maximum Dose :</label><input type = "text" name = "MaximumDosage" class = "box" required/><br /><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>

                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

        </div>
    </div>
</div>
</body>
</html>