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

$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<html>

<head>
    <title><?php
        echo "Depression Treatment";
        ?></title>
    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('../css/header.php');
include "../css/depNav.php";?>

    <div class="whiteBack">
        <div class="content" style="text-align: center">
          <div class="redBackCol">
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
			</div>
				<div class="divBar">
				</div>
            <div class="row">
                <?php include '../scheduleApp.php';?>
                <div class="whiteBackCol">
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

