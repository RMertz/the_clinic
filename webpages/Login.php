<?php
include("php/config.php");
$error = " ";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    session_start();
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $count = $db->query("SELECT DoctorID, Username FROM `DoctorInformation` WHERE LastName = '$myusername' and Username = '$mypassword'");

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count->rowCount() == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

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

    <a href="index.html">HOME PAGE</a>
    <a href="profile.html">PROFILE</a>
    <a href="patientPage.html">PATIENTS</a>
    <a href="help.html">HELP</a>
    <a href="Login.php">LOGIN</a>
    <div id="searchBar">
        <img src="images/searchBar.PNG" alt="Search Bar" border="0px" height= "20px" width= "150px">
    </div>
</div>

<div class = "content" >
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</body>
</html>
