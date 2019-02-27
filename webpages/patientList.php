<?php
include('php/Config.php');
$docSQL = $db->prepare("SELECT DoctorID FROM `Doctor Information` WHERE username = :user_check");
$docSQL->bindParam(":user_check",$user_check);
$docSQL->execute();
$row = $docSQL->fetch();
$docID = $row['DoctorID'];
//echo $docID;
$patients = $db->prepare( "SELECT * FROM `Patient Information` WHERE DoctorID = :doc_ID");
$patients->bindParam(":doc_ID", $docID);
$patients->execute();
$patientLi = $patients->fetchAll();
//echo $patientLi['LastName'];
/*foreach ($patientLi as $val){
    echo $val['FirstName'] . " " . $val['LastName'] . "\n";
}*/

?>

<html>

<head>
    <title>Your Patients</title>
    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
</head>

<body>

<div class="header">

    <div class=headerRow">
        <div class= "column left">
            <h1>The Clinic</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src="images/longHeader.png" alt="HeaderImage">
            </div>
        </div>
    </div>


</div>

<div class="navBar">

    <a href="welcome.php">Home</a>
    <a href = "php/logout.php">Sign Out</a>
    <div id="searchBar">
        <img src="images/searchBar.PNG" alt="Search Bar" border="0px" height= "20px" width= "150px">
    </div>



</div>

    <div class="content">
        <h2>
            Select a patient to View Info
        </h2>
        <li>
            <?php
                foreach ($patientLi as $val){
                    echo "<a href = 'patientHome.php?id=".$val['PatientID']."'>".$val['FirstName']." ".$val['LastName'] . "</a>";
                }
            ?>
        </li>
        <ul id="oneFourth"

        </ul>
    </div>
</body>
<footer>
    <h4>
        <a href="https://github.com/RMertz/the_clinic">About This App</a>
    </h4>
</footer>

</html>
