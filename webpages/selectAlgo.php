<?php
include('php/session.php');
$patients = $db->prepare( "SELECT * FROM `Algorithm`");
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
    <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="welcome.php">Home</a>
    <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="patientList.php">Your Patients</a>
    <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
    <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
    <a class="<?= ($activePage == 'bipolarHome') ? 'active':''; ?>" href=<?php echo "bipolar/bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
    <a class="<?= ($activePage == 'selectAlgo') ? 'active':''; ?>" href=<?php echo "selectAlgo.php?id=".$_GET['id']."&level1=1&level2=0&level3=0&level4=0"?>>Select Algorithm</a>
    <a href=<?php echo "medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
    <a ID="logoutButton"href = "php/logout.php">Sign Out</a>
</div>

<div >
    <h2>
        Select a Algorithm to View
    </h2>
    <div class="redBack">
        <ul>
            <li>
                <?php
                foreach ($patientLi as $val){
                    echo "<a href = 'showAlgo.php?name=".$val['AlgorithmID']."&id=".$_GET['id'].'&level1=1&level2=0&level3=0&level4=0' ."'>".$val['name']. "</a>";
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