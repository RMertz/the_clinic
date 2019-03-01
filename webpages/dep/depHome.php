<?php
include('../php/session.php');
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

    <div class="navBar">
        <a href="../welcome.php">Home</a>
        <a href="../patientList.php">Your Patients</a>
        <a href=<?php echo "../patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href=<?php echo "../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="row">
        <div class="content" style="text-align: center">
            <h2 >
                Initial Step:
            </h2>
            <p>
                Initial therapy with citalopram or sertraline (unless compelling indication for alternate agent).<br>
                Address side effects and encourage adherence in 1 week. Evaluate response in 3-4 weeks.
            </p>
            <h3>
                <a href=<?php echo "dep2.php?id=".$_GET['id'];?>>Next Step</a>
            </h3>
            <p>
                Stub: update database for step we are on
            </p>
            <div class="row">
                <div class="column2">
                    <h3>Schedule Patient Visit</h3>
                    <form action = "" method = "post">
                        <input type = "date" name="Date" value = " Schedule Patient Visit "/><br/><br/>
                        <input type = "submit" name="Schedule" value = " Schedule Patient "/>
                    </form>
                </div>
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

