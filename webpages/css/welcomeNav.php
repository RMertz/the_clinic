<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/welcome.php"?>>Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/patientList.php"?>>Your Patients</a>
    <a class="<?= ($activePage == 'createAlgo' || $activePage == 'createSteps' || $activePage == 'done') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/createAlgo/createAlgo.php"?>>Create an Algorithm</a>
    <a class="<?= ($activePage == 'createPatient') ? 'active':''; ?>"href=<?php echo "/group1/the_clinic/webpages/createPatient.php"?>>New Patient</a>
    <a id="logoutButton" href = "/group1/the_clinic/webpages/php/logout.php">Sign Out</a>
</div>
