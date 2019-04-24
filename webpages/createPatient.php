<?php
include('php/session.php');
$error = " ";
include "php/createUser.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $docID = $db->prepare("SELECT DoctorID FROM `DoctorInformation` WHERE Username = :user_check");
    $docID->bindParam(":user_check", $user_check);
    $docID->execute();
    $row = $docID->fetch();
    $doc_ID = $row['DoctorID'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $diagnosis = $_POST['diagnosis'];
    $newUser = new createUser();
    $error= $newUser->addPatient($doc_ID,$lastname,$firstname,$diagnosis);
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create new Patient</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>
<?php include('css/header.php'); ?>

<div class="navBar">

    <a href="welcome.php">HOME</a>
    <a href="patientList.php">YOUR PATIENTS</a>
    <a href="createPatient.php">NEW PATIENT</a>
    <a id="logoutButton" href = "php/logout.php?type=0">LOG OUT</a>

</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Create New Patient Profile</b></div>

                <div style = "padding:30px; background-color: #dfdce3; ">

                    <form action = "" method = "post">
                        <label>First Name :</label><input type = "text" name = "firstname" class = "box" required/><br /><br />
                        <label>Last Name :</label><input type = "text" name = "lastname" class = "box" required/><br/><br />
                        <label>Diagnosis :</label><input type = "text" name = "diagnosis" class = "box" required/><br /><br />
                        <input class="submitLogin" type = "submit" value = " Submit "/><br />
                    </form>

                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</body>
</html>
