<?php
include('php/session.php');
$docID = $db->prepare("SELECT DoctorID FROM `DoctorInformation` WHERE LastName = :user_check");
$docID->bindParam(":user_check", $user_check);
$docID->execute();
$row = $docID->fetch();
$doc_ID = $row['DoctorID'];
$patients = $db->prepare( "SELECT * FROM `PatientInformation` WHERE DoctorID = :doc_ID");
$patients->bindParam(":doc_ID", $doc_ID);
$patients->execute();
$patientLi = $patients->fetchAll();
?>

<html>

<head>
    <title>Your Patients</title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
</head>

<body>

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
    <a href="welcome.php">HOME</a>
    <a href="patientList.php">YOUR PATIENTS</a>
    <a href = "php/logout.php">LOG OUT</a>
    <div id="searchBar">
        <img src="images/searchBar.png" alt="Search Bar" border="0px" height= "20px" width= "150px">
    </div>
</div>

    <div class="content">
        <h2>
            Select a patient to View Info
        </h2>
        <ul>
        <li>
            <?php
                foreach ($patientLi as $val){
                    echo "<a href = 'patientHome.php?id=".$val['PatientID']."'>".$val['FirstName']." ".$val['Surname'] . "</a>";
                }
            ?>
        </li>
        </ul>

    </div>
</body>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>
