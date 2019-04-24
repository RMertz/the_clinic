<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href=<?php echo $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/welcome.php"?>>Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href=<?php echo $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/patientList.php"?>>Your Patients</a>
    <a class="<?= ($activePage == 'createAlgo') ? 'active':''; ?>" href=<?php echo $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/createAlgo/createAlgo.php"?>>Create an Algorithm</a>
    <a id="logoutButton" href = "../php/logout.php">Sign Out</a>
</div>
