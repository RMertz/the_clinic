<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
if($activePage == 'bipolarHome'|| $activePage == 'bipolarM2' || $activePage == 'bipolarM3' || $activePage == 'bipolarM4' || $activePage == 'bipolarMHome' || $activePage == 'bipolarD1-1' || $activePage == 'bipolarD1-2' || $activePage == 'bipolarD1-3' || $activePage == 'bipolarD2-1' || $activePage == 'bipolarD2-2' || $activePage == 'bipolarD3' || $activePage == 'bipolarD4' || $activePage == 'bipolarDHome'){
    $yes = true;
}else{$yes=false;}
?>
<div class="navBar">
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/welcome.php"?>>Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/patientList.php"?>>Your Patients</a>
    <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a class="<?= ($yes) ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/bipolar/bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a class="<?= ($activePage == 'bipolarMDQ' || $activePage == 'MDQAnalysis') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/bipolar/bipolarMDQ.php?id=".$_GET['id'];?>>MDQ</a>
    <a class="<?= ($activePage == 'selectAlgo') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/selectAlgo.php?id=".$_GET['id']."&level1=1&level2=0&level3=0&level4=0"?>>Select Algorithm</a>
    <a class="<?= ($activePage == 'medicationHome') ? 'active':''; ?>"href=<?php echo "/group1/the_clinic/webpages/medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a id="logoutButton" href = "/group1/the_clinic/webpages/logout.php">Sign Out</a>
</div>
