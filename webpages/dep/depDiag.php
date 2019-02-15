<?php
include('../php/session.php');
//style="text-align: left;
//    padding: 0;"
?>

<html>

<head>
    <title><?php
        echo "Depression Treatment";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
</head>

<body>
<div id="header">
    <h1>
        <br>
        <?php
        echo "Depression Treatment for 'Insert Name Here'";
        ?>
    </h1>

    <div id="navBar">
        <a href="../welcome.php">Home</a>
        <a href="../patientList.php">Your Patients</a>
        <a href="depHome.php">Depression Treatment</a>
        <a href="depDiag.php">Depression PHQ</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>
    <div >
        <div class="content">
            <h2 >
                Stub for patient health questionnaire form.
            </h2>
        </div>
    </div>
</body>

<footer>
    <h4>
        About This App
    </h4>
</footer>

</html>

