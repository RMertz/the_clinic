<?php
if((include $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/php/Config.php")==TRUE){
}else{
    echo "nooo";
};
$error = " ";
include "php/createUser.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $passwd = $_POST['passwd'];
    $newUser = new createUser();
    $error= $newUser->addDoctor($myusername,$lastname,$firstname,$passwd);
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create User</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>
<div class="header">

    <div class="headerRow">
        <div class= "column left">
            <h1>The Clinic</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src="images/HeaderImageOutline.png" alt="HeaderImage">
            </div>
        </div>
    </div>


</div>

<div class="navBar">

    <a href="index.html">HOME PAGE</a>
    <a href="profile.html">PROFILE</a>
    <a href="patientPage.html">PATIENTS</a>
    <a href="help.html">HELP</a>
    <a id="loginButton" href="Login.php">LOGIN</a>
    <a href="createUser.php">CREATE USER</a>

</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Create New Doctor Profile</b></div>

                <div style = "padding:30px; background-color: #dfdce3; ">

                    <form action = "" method = "post">
                        <label>First Name :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                        <label>Last Name :</label><input type = "text" name = "lastname" class = "box" /><br/><br />
                        <label>UserName :</label><input type = "text" name = "username" class = "box"/><br /><br />
                        <label>Password :</label><input type = "password" name = "passwd" class = "box" /><br/><br />
                        <input type = "submit" value = " Submit "/><br />
                    </form>

                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</body>
</html>