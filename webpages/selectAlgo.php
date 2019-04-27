<?php
include('php/session.php');
$patients = $db->prepare( "SELECT * FROM `Algorithm`");
$patients->execute();
$patientLi = $patients->fetchAll();
$activePage = basename($_SERVER['PHP_SELF'], ".php");
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
include "css/selectedPatientNav.php"?>

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