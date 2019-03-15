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
            <h1>The Clinician's Guide</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src="images/HeaderImageOutline.png" alt="HeaderImage">
            </div>
        </div>
    </div>
</div>

		<div class="navBar">
			
				<a href="index.html">HOME PAGE</a>
				<a href="profile.html">PROFILE</a>
				<a href="patientPage.html">PATIENTS</a>
				<a href="help.html">HELP</a>
				<a id="logoutButton" href="php/logout.php?type=0">LOGOUT</a>
				
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
