<?php
include('../php/session.php');
//style="text-align: left;
//    padding: 0;"
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
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href="depDiag.php">Depression PHQ</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>
</div>
<div class="row" >
    <div class="column3">
        <h2 >
            If Non-response:
        </h2>
        <p>
            Stub for Non-response directions
        </p>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Stub
        </p>
    </div>
    <div class="column3">
        <h2 >
            If Partial Response:
        </h2>
        <p>
            Stub for Partial Response directions
        </p>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Stub
        </p>

    </div>
    <div class="column3">
        <h2 >
            If Full response:
        </h2>
        <p>
            Stub for Full response directions
        </p>
        <h3>
            Re-Eval Timeline:
        </h3>
        <p>
            Stub
        </p>
    </div>
</div>
<h3>
    <a href="dep2.php">Back</a>
</h3>
</body>

<footer>
    <h4>
        <a href="https://github.com/RMertz/the_clinic">About This App</a>
    </h4>
</footer>

</html>