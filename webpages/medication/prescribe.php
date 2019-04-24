<?php
include('../php/session.php');
$medications = $db->prepare("SELECT * FROM MedicationInformation");
$medications->execute();
?>
<html>

    <head>
        <title><?php
            echo "Prescribe Patent Medication";
            ?></title>
        <link rel="stylesheet" href="../css/global.css" type="text/css">
        <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
        <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
    </head>

    <body>
        <?php include('../css/header.php');
        include "../css/selectedPatientNav.php";?>

        <div class="content" style="text-align: center">
            <h2>Pick a Medication To Prescribe</h2>

            <li>
                <?php
                foreach ($medications as $val){
                    echo "<a href = 'prescription.php?medid=".$val['MedicationID']."&id=".$_GET['id']."'>".$val['Name'] . "</a>";
                }
                ?>
            </li>
        </div>
    </body>
</html>