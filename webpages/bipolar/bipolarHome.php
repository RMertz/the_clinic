<?php
include('../php/session.php');
include('../php/scheduleVisit.php');
include('../php/bipolarTreatmentHandler.php');
$treatmentOptions = array();
$type = new bipolarTreatmentHandler($_GET['id']);
$treatmentOptions = $type->checkTreatment();
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Schedule'])) {
        $schedule = new scheduleVisit($_GET['id']);
        if ($schedule->schedule($_POST['Date'], 0)) {
            $error = "Next Visit Added.";
        } else {
            $error = "Next Visit Not Added, Please Select a Valid Date.";
        }
    }else if(isset($_POST['DepD'])) {
        $type->whatToDo(1);
    }else if(isset($_POST['DepM'])){
        $type->whatToDo(2);
    }
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<html>

<head>
    <title><?php
        echo "Bipolar Treatment Home";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
</head>

<body>
<?php include('../css/header.php'); ?>

    <div class="navBar">
        <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
        <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
        <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a class="<?= ($activePage == 'bipolarHome') ? 'active':''; ?>" href=<?php echo "bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
        <a class="<?= ($activePage == 'bipolarMDQ') ? 'active':''; ?>" href=<?php echo "bipolarMDQ.php?id=".$_GET['id'];?>>Bipolar MDQ</a>
        <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a class="<?= ($activePage == 'depDiag') ? 'active':''; ?>" href=<?php echo "../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a ID="logoutButton"href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="row">
        <div class="content" style="text-align: center">
            <h2 >
                <?php echo $treatmentOptions['title']?>
            </h2>
            <form action = "" method = "post">
                <input type = "submit" class= "submit" name ="DepD" value = <?php echo $treatmentOptions['biD'];?>/><br />
                <input type = "submit" class= "submit" name ="DepM" value = <?php echo $treatmentOptions['biM'];?>/><br />
            </form>
            <div class="row">
                <?php include '../scheduleApp.php';?>
                <div class="column2">
                    <h3>Prescribe Patient a Medication</h3>
                    <a href=<?php echo "../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>

