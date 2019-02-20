<?php
include('../php/session.php');
//style="text-align: left;
//    padding: 0;"

$error = " ";
$myusername = " ";
$myGender = " ";
$mypassword = " ";
$q1 = " ";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $myGender = $_POST['gender'];
    $q1 = $_POST['q1'];
    $error = "Your Login Name or Password is invalid";

    /*$count = $db->query("SELECT doctorID, username FROM `Doctor Information` WHERE username = '$myusername' and password = '$mypassword'");

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count->rowCount() == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }*/
}
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
        <div >
            <h2 >
                Stub for patient health questionnaire form.<br>
            </h2>

            <div style = "margin:30px">

                <form action = "" method = "post">
                    <table style="width:100%">
                        <tr>
                            <th style="width: 75%">Over the past 2 weeks, how often have you been bothered by any of the following problems?</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                        </tr>
                        <tr>
                            <td>Little interest or plesure in doing things.</td>
                            <td><input type="radio" name="gender" value="male" checked></td>
                            <td><input type="radio" name="gender" value="female"></td>
                            <td><input type="radio" name="gender" value="other"></td>
                            <td><input type="radio" name="gender" value="other"></td>
                        </tr>
                    </table><br/><br/>


                    <input type = "submit" value = " Submit PHQ "/><br />
                </form>

                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                <div><?php echo $q1;
                    echo $myGender;
                    ?></div>
            </div>
        </div>
    </div>
</body>

<footer>
    <h4>
        <a href="https://github.com/RMertz/the_clinic">About This App</a>
    </h4>
</footer>

</html>

