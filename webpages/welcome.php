<?php
if(include('php/session.php')){

};

$docID = $db->prepare("SELECT Firstname FROM `DoctorInformation` WHERE Username = :user_check");
$docID->bindParam(":user_check", $user_check);
$docID->execute();
$row = $docID->fetch();
$login_session = $row['Firstname'];
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>
<?php include('css/header.php'); ?>


    <div class="navBar">
        <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="welcome.php">Home</a>
        <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="patientList.php">Your Patients</a>
        <a class="<?= ($activePage == 'createAlgo') ? 'active':''; ?>" href="createAlgo/createAlgo.php">Create an Algorithm</a>
        <a id="logoutButton" href = "php/logout.php">Sign Out</a>

    </div>

		
<div class="content">
    <h2>
        Welcome <?php echo $login_session; ?>
    </h2>
	
	<div class="redBack">
	
		<div class="navigationBoxes">
			<div class="navBox">
				<a class="navBoxSm" href="profile.html">PROFILE</a>
				<br><br>
				<a href: "profile.html">
				<img ID="Icon" src="images/DoctorIcon.png" alt="DoctorIcon">
				</a>
				<br><br>
				<paragraph>
				Manage your profile and preferences here
				</paragraph>
			</div>
			
			<div class="navBox">
				<a class="navBoxSm" href="patientList.php">PATIENTS</a>
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
				<a class="navBoxSm" href="help.html">HELP</a>
				<br><br>
				<a href: "help.html">
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

