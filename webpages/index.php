<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Clinic</title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">

</head>

<?php include('css/header.php');
include "css/basicNav.php" ?>


<div class="content">

    <div class="redBack">

        <div class="navigationBoxes">
            <div class="navBox">
                <a class="navBoxSm" href="Login.php">PROFILE</a>
                <br><br>
                <a href="index.php">
                    <img ID="Icon" src="images/DoctorIcon.png" alt="DoctorIcon">
                </a>
                <br><br>
                <paragraph>
                    Manage your profile and preferences here
                </paragraph>
            </div>

            <div class="navBox">
                <a class="navBoxSm" href="Login.php">PATIENTS</a>
                <br><br>
                <a href="patientList.php" >
                    <img ID="Icon" src="images/PatientIcon.png" alt="PatientIcon">
                </a>
                <br><br>

                <paragraph>
                    View, Manage, and Work with Patients
                </paragraph>

            </div>

            <div class="navBox">
                <a class="navBoxSm" href="help.php">HELP</a>
                <br><br>
                <a href="help.php">
                    <img ID="Icon" src="images/HelpIcon.png" alt="HelpIcon">
                </a>
                <br><br>
                <paragraph>
                    Find out how to use features of this application
                    or
                    contact us about any problems you may be having.
                </paragraph>
            </div>
        </div>

    </div>


</div>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>


</body>
</html>
