<?php
include('../php/session.php');
include('../php/scheduleVisit.php');
$error = " ";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule($_POST['Date'],0)){
        $error = "Next Visit Added.";
    }else{
        $error="Next Visit Not Added, Please Select a Valid Date.";
    }
}
?>

<html>

<head>
    <title><?php
        echo "Depression Treatment Step 2";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/bipolarNav.php";?>
	
<div class="content">
    <div class="whiteBack">
        <div class="redBackCol" >
            <h2 >
                If Non-response:
            </h2>
            <p>
                Ensure medication adherence.<br>
                Optimize dose OR switch (alternate SSRI or non-SSRI).
            </p>
            <h3>
                Re-Eval Timeline:
            </h3>
            <p>
                Evaluate Response in 3-4 weeks
            </p>
            <h3>
                <a href=<?php echo "depNR3.php?id=".$_GET['id'];?>>Next Step</a>
            </h3>
            <p>
                Stub: update database for step we are on
            </p>
        </div>
        <div class="redBackCol">
            <h2 >
                If Partial Response:
            </h2>
            <p>
                Optimize dose OR <br>augment<br>
            </p>
            <h3>
                Re-Eval Timeline:
            </h3>
            <p>
                Evaluate Response in 3-4 weeks
            </p>
            <h3>
                <a href=<?php echo "depPR3.php?id=".$_GET['id'];?>>Next Step</a>
            </h3>
            <p>
                Stub: update database for step we are on
            </p>
        </div>
        <div class="redBackCol">
            <h2 >
                If Full response:
            </h2>
            <p>
                Continue same treatment for at least 4-9 months
            </p>
        </div>
    </div>
	<div class="divBar">
	</div>
    <div class="whiteBack">
        <?php include '../scheduleApp.php';?>
        <div class="whiteBackCol">
            <h3>Prescribe Patient a Medication</h3>
            <a href=<?php echo "../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
        </div> 
    </div>
    <div class="whiteBack">
	<h3 class="clearBackCol">
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Back</a>
    </h3>
	</div>
</div>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>
</body>
</html>



