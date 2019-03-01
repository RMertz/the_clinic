<?php
include('../php/session.php');
?>
<html>

    <head>
        <title><?php
            echo "Prescribe Patent Medication";
            ?></title>
        <link rel="stylesheet" href="../css/global.css" type="text/css">
        <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    </head>

    <body>
        <div id="header">
            <div class="header">
                <div class=headerRow">
                    <div class= "column left">
                        <h1>The Clinic</h1>
                    </div>
                    <div class= "column right">
                        <div id="headerLogo">
                            <img src="../images/longHeader.png" alt="HeaderImage">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navBar">
            <a href="../welcome.php">Home</a>
            <a href="../patientList.php">Your Patients</a>
            <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
            <a href=<?php echo "../dep/depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
            <a href=<?php echo "../dep/depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
            <a href=<?php echo "medicationHome.php?id=".$_GET['id'];?>>Medication</a>
            <a href = "../php/logout.php">Sign Out</a>
        </div>

        <div class="content" style="text-align: center">
            <h2>Coming Soon!</h2>
        </div>
    </body>
</html>
