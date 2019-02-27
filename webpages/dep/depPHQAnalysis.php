<?php
include('../php/session.php');
$diagnosis='';
$treatmentTF='';
if($_GET['type']==0){
    if($_GET['q1']==1&&$_GET['q2']==1&&$_GET['q3']==1) {
        $diagnosis = "Depression";
    }else{
        $diagnosis = "None";
    }
}

?>

<html>

<head>
    <title><?php
        echo "Depression PHQ";
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
        <a href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a href = "../php/logout.php">Sign Out</a>
    </div>

    <div class="content" >

    </div>
</body>
