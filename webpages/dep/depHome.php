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

    <div class="row">
        <div class="content">
            <h2 >
                Initial Step:
            </h2>
            <p>
                Stub for inital step directions
            </p>
            <h3>
                <a href="dep2.php">Next Step</a>
            </h3>
            <p>
                Stub: update database for step we are on
            </p>
        </div>
    </div>
</body>

<footer>
    <h4>
        <a href="https://github.com/RMertz/the_clinic">About This App</a>
    </h4>
</footer>

</html>

