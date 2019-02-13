<?php
include("php/config.php");
session_start();
$error = " ";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);


    $sql = "SELECT `doctorID`, `patientID`, `username`, `password`, `lastname`, `firstname` FROM `Doctor Information` WHERE  username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);


    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        //session_register("myusername");
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
    <div id="header">
        <h1>
            <br>
            <img src="images/hospitalLogo.jpg" alt="Hospital Logo" width="20%" height="20%">
            Login
        </h1>

        <div id="navBar">
            <a href="index.html">HOME PAGE</a>
            <a href="profile.html">PROFILE</a>
            <a href="patientPage.html">PATIENTS</a>
            <a href="help.html">HELP</a>
            <a href="Login.php"></a>
        </div>
    <div/>

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

</body>
</html>
