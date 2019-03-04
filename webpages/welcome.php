<?php
include('php/session.php');
$docID = $db->prepare("SELECT Firstname FROM `DoctorInformation` WHERE LastName = :user_check");
$docID->bindParam(":user_check", $user_check);
$docID->execute();
$row = $docID->fetch();
$login_session = $row['Firstname'];
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>


<div class="header">
    <div class=headerRow">
        <div class= "column left">
            <h1>The Clinic</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src="images/longHeader.png" alt="HeaderImage">
            </div>
        </div>
    </div>
</div>
<div class="navBar">
    <a href="welcome.php">HOME PAGE</a>
    <a href="patientList.php">YOUR PATIENTS</a>
    <a href="php/logout.php?type=0">LOG OUT</a>
    <a href="help.html">HELP</a>
    <div id="searchBar">
        <img src="images/searchBar.png" alt="Search Bar" border="0px" height= "20px" width= "150px">
    </div>
</div>
<div class="content">
    <h2>
        Welcome <?php echo $login_session; ?>
    </h2>
</div>
<div class="content">
    <p style="text-align:center;" >
        Click "Your Patients to begin"
    </p>
</div>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>
</body>

</html>