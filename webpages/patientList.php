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
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>

<?php include('css/header.php');
include "css/welcomeNav.php" ?>

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
