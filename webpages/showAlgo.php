<?php
include('php/session.php');
include_once ('php/jsonQuery.php');
include('php/scheduleVisit.php');
include_once ('php/showAlgo.php');
include_once ('php/getAlgoName.php');
$error = " ";
$id = $_GET['name'];
$getter = new getAlgoName();
$name = $getter->getName($id);

$query = new jsonQuery();
$json = $query->getJson($name);


$show = new showAlgo($name,$json);


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
    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Bootstrap css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.0/mustache.js"></script>
    <title><?php
        echo "Depression Treatment Step 2";
        ?></title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
    <link rel="icon" type="image/png" href="https://esof423.cs.montana.edu/group1/the_clinic/webpages/images/favicon.ico">
</head>

<body>
<?php include('css/header.php');
include "css/selectedPatientNav.php"?>

<div class="center">
    <h2>Directions for Step <?php echo $show->getStep($_GET['level1'],$_GET['level2'],$_GET['level3'],$_GET['level4'])?>:</h2>
    <h3><?php echo $show->getDirections($_GET['level1'],$_GET['level2'],$_GET['level3'],$_GET['level4']) ?></h3>
    <h3>Re-Eval Timeline:</h3>
    <p><?php echo $show->getReEval($_GET['level1'],$_GET['level2'],$_GET['level3'],$_GET['level4']) ?></p>
</div>

<div class="row" >
    <div class="column3" id="reason2Div">
        <h2 >
            <?php echo $show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason2'] ?>
        </h2>
        <h3 id="reason2">
            <a href=<?php echo "showAlgo.php?id=".$_GET['id']."&name=".$_GET['name']."&level1=1".$show->getNextStep($_GET['level2'],$_GET['level3'],$_GET['level4'],2);?>>Next Step</a>
        </h3>


    </div>
    <div class="column3" id="reason1Div">
        <h2 >
            <?php echo $show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason1'] ?>
        </h2>

        <h3 id="reason1">
            <a href=<?php echo "showAlgo.php?id=".$_GET['id']."&name=".$_GET['name']."&level1=1".$show->getNextStep($_GET['level2'],$_GET['level3'],$_GET['level4'],1);?>>Next Step</a>
        </h3>


    </div>
    <div class="column3" id="reason3Div">
        <h2 >
            <?php echo $show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason3'] ?>
        </h2>
        <h3 id="reason3">
            <a href=<?php echo "showAlgo.php?id=".$_GET['id']."&name=".$_GET['name']."&level1=1".$show->getNextStep($_GET['level2'],$_GET['level3'],$_GET['level4'],3);?>>Next Step</a>
        </h3>

    </div>

</div>
<?php if($_GET['level4']!=0){
    echo "<script>
            $('#reason2').hide();
            $('#reason1').hide();
            $('#reason3').hide();
            </script>";
    }
    if ($show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason1'] == ''){
        echo "<script>$('#reason1').hide()</script>";
    }
    if ($show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason2'] == ''){
        echo "<script>$('#reason2').hide()</script>";
    }
    if ($show->getReasons($_GET['level1'],$_GET['level2'],$_GET['level3'])['reason3'] == ''){
        echo "<script>$('#reason3').hide()</script>";
    }
    ?>
<div class="row">
    <?php include 'scheduleApp.php';?>
    <div class="column2">
        <h3>Prescribe Patient a Medication</h3>
        <a href=<?php echo "../medication/prescribe.php?id=".$_GET['id'];?>>Prescription Page</a>
    </div>
</div>
<h3>
    <a href=<?php echo "dep2.php?id=".$_GET['id'];?>>Back</a>
</h3>
</body>
<script src="js/createAlgo.js"></script>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>