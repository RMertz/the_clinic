<?php
if((include $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/php/Config.php")==TRUE){
}else{
    echo "nooo";
};
$error = " ";
include "php/createUser.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $passwd = $_POST['passwd'];
    $newUser = new createUser();
    $error= $newUser->addDoctor($username,$lastname,$firstname,$passwd);
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Create New User</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">

</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>
<?php include('css/header.php'); ?>

<div class="navBar">


    <a id="logoutButton"  href="Login.php">LOGIN</a>


</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <div class="loginLabel"><b>Create New Doctor Profile</b></div>

                <div >

                    <form action = "" method = "post">
                        <label>First Name :</label><input type = "text" name = "firstname" class = "box" required/><br /><br />
                        <label>Last Name :</label><input type = "text" name = "lastname" class = "box" required/><br/><br />
                        <label>UserName :</label><input type = "text" name = "username" class = "box" required/><br /><br />
                        <label>Password :</label><input type = "password" name = "passwd" class = "box" required/><br/><br />
                        <input class="submitLogin" type = "submit" value = " Submit "/><br />
                    </form>

                    <div class="complete" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

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

