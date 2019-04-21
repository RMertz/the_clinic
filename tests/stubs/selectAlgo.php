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
    <a href="welcome.php">HOME</a>
    <a href="patientList.php">YOUR PATIENTS</a>
    <a href="createPatient.php">NEW PATIENT</a>
    <a id="logoutButton" href = "php/logout.php?type=0">LOG OUT</a>

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