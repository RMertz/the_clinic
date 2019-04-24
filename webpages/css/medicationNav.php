<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
    <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a class="<?= ($activePage == 'bipolarHome') ? 'active':''; ?>" href=<?php echo "bipolar/bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a class="<?= ($activePage == 'selectAlgo') ? 'active':''; ?>" href=<?php echo "selectAlgo.php?id=".$_GET['id']."&level1=1&level2=0&level3=0&level4=0"?>>Select Algorithm</a>
    <a class="<?= ($activePage == 'medicationHome') ? 'active':''; ?>"href=<?php echo "medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "../php/logout.php">Sign Out</a>
</div>