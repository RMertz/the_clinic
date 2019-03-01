<?php
include('../php/session.php');
?>

<html>

<head>
    <title><?php
        echo "Depression Treatment Step 2";
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
        <a href="../patientHome.php">Patient Home</a>
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href=<?php echo "../medication/medicationHome.php?id=".$_GET['id'];?>>Medication</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="row" >
        <div class="column3">
            <h2 >
                If Non-response:
            </h2>
            <p>
                Switch to a different antidepressant<br> (SSRI or non-SSRI)
            </p>
            <h3>
                Re-Eval Timeline:
            </h3>
            <p>
                Provider Discretion
            </p>
        </div>
        <div class="column3">
            <h2 >
                If Partial Response:
            </h2>
            <p>
                Optimize dose OR augment <br>OR switch
            </p>
            <h3>
                Re-Eval Timeline:
            </h3>
            <p>
                Provider Discretion
            </p>

        </div>
        <div class="column3">
            <h2 >
                If Full response:
            </h2>
            <p>
                Continue same treatment for at least<br>
                4 - 9 months
            </p>
            <h3>
                Re-Eval Timeline:
            </h3>
            <p>
                Provider Discretion
            </p>
        </div>
        <br/>
        <h3 style="text-align: center">*Switch to a non-SSRI after two SSRI failures*</h3>
    </div>
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
    <h3>
        <a href=<?php echo "dep2.php?id=".$_GET['id'];?>>Back</a>
    </h3>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>



