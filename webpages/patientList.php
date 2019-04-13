<?php
include('php/session.php');
$docID = $db->prepare("SELECT DoctorID FROM `DoctorInformation` WHERE Username = :user_check");
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

<?php include('css/header.php'); ?>


<div class="navBar">
    <a href="welcome.php">HOME</a>
    <a href="patientList.php">YOUR PATIENTS</a>
    <a href="createPatient.php">NEW PATIENT</a>
    <a id="logoutButton" href = "php/logout.php?type=0">LOG OUT</a>

</div>

    <div >
        <h2>
            Select a Patient to View Info
        </h2>
		<div class="redBack">
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
    </div>
</body>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>
