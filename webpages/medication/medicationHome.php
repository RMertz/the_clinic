<?php
include('../php/session.php');
//$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<html>

<head>
    <title><?php
        echo "Medication Home";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/selectedPatientNav.php";?>


<div class="content" style="text-align: center">
    <div class="row">
        <div class="column2">
            <h2>Prescribe Patient a Medication</h2><br/>
            <a href=<?php echo "prescribe.php?id=".$_GET['id'];?>>Prescribe Patent a Medication</a>
        </div>
        <div class="column2">
            <h2>Create a Medication</h2><br/>
            <a href=<?php echo "createAMedication.php?id=".$_GET['id'];?>>Create a Medication</a>
        </div>
    </div>
</div>
</body>
</html>
