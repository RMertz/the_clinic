<?php
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Create New Patient</title>

    <link rel="stylesheet" href="css/global.css" type="text/css">
    <link rel="stylesheet" href="css/indexHome.css" type="text/css">
    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Bootstrap css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.0/mustache.js"></script>
</head>

<link rel="icon" type="image/png" href="images/favicon.ico">

<body>
<?php include('css/header.php'); ?>

<div class="navBar">

    <a href="index.html">HOME PAGE</a>
    <a href="profile.html">PROFILE</a>
    <a href="patientPage.html">PATIENTS</a>
    <a href="help.html">HELP</a>
    <a id="logoutButton"  href="Login.php">LOGIN</a>
    <a href="createUser.php">CREATE USER</a>

</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <div class="loginLabel"><b>Create New Treatment Algorithm</b></div>

                <div>

                    <form action = "" method = "post">
                        <label for="name">Algorithm Name :</label>
                        <input type = "text" name = "name" id="name" class = "box" required/><br /><br />
                        <label for="directions">Intro Directions :</label>
                        <input type = "text" name = "directions" id="directions" class = "box" required/><br/><br />
                        <label for="firstSteps">How many starting points are there?</label>
                        <select class="form-control" name="firstSteps" id="firstSteps" required>
                            <option disabled selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">2</option>
                        </select>
                        <div  id="step1Div">
                            <label for="step1">Step 1 :</label>
                            <input type = "text" name = "step1" id="step1" class = "box" required/><br /><br />
                        </div>

                        <div  id="step2Div">
                            <label for="step2">Step 2 :</label>
                            <input type = "text" name = "step2" id="step2" class = "box" required/><br /><br />
                        </div>

                        <div  id="step3Div">
                            <label for="step3">Step 3 :</label>
                            <input type = "text" name = "step3" id="step3" class = "box" required/><br /><br />
                        </div>
                        <input class="submitLogin" type = "submit" value = " Submit "/><br />
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
<script src="js/createAlgo.js"></script>
</html>

