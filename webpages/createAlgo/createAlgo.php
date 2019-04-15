<?php
$error="";
include_once("../php/session.php");
include_once ("../php/createAlgo.php");
include_once ("../php/jsonQuery.php");
echo("<script> console.log('Here 0') </script>");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo("<script> console.log('Here 1.1') </script>");
    $maker = new createAlgo();
    $query = new jsonQuery();
    echo("<script> console.log('Here 1') </script>");
    if($_POST["firstSteps"] == 1){
        echo("<script> console.log('Here 2') </script>");
        $algo = $maker->createArr1($_POST['directions'],$_POST['re-eval'],$_POST['step1']);
        echo("<script> console.log('Here 3') </script>");
        $error = $query->setJson(json_encode($algo),$_POST['name']);
    }else if($_POST["firstSteps"] == 2){
        $algo = $maker->createArr2($_POST['directions'],$_POST['re-eval'],$_POST['step1'],$_POST['step2']);
        $error = $query->setJson(json_encode($algo),$_POST['name']);
    }else if($_POST["firstSteps"] == 3){
        $algo = $maker->createArr3($_POST['directions'],$_POST['re-eval'],$_POST['step1'],$_POST['step2'],$_POST['step3']);
        $error = $query->setJson(json_encode($algo),$_POST['name']);
    }
    echo("<script> console.log('Here 4') </script>");
    if($error == "Sorry that name already exists"){

    }else {
        header("location: createSteps.php?name=" . urlencode($_POST['name']) . "&level1=1" . "&level2=". $_POST['firstSteps'] . "&level3=0" . "&level4=0");
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Create New Treatment Algorithm</title>

    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Bootstrap css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.0.0/mustache.js"></script>
</head>

<link rel="icon" type="image/png" href="../images/favicon.ico">

<body>
<?php include('../css/header.php'); ?>

<div class="navBar">

    <a href="../index.html">HOME PAGE</a>
    <a href="../profile.html">PROFILE</a>
    <a href="../patientPage.html">PATIENTS</a>
    <a href="../help.html">HELP</a>
    <a id="logoutButton"  href="../Login.php">LOGIN</a>
    <a href="../createUser.php">CREATE USER</a>

</div>

<div class = "content" >

    <div class="redBack">
        <div class="navigationBoxes">
            <div class= "loginBox">
                <div class="loginLabel"><b>Create New Treatment Algorithm</b></div>

                <div style="margin: 10px">

                    <form action = "" method = "post">
                        <div>
                            <label for="name">Algorithm Name :</label>
                            <input type = "text" name = "name" id="name" class = "box" required/>
                        </div>
                        <div>
                            <label for="directions">Intro Directions :</label>
                            <input type = "text" name = "directions" id="directions" class = "box" required/>
                        </div>
                        <div>
                            <label for="re-eval">Initial Re-Eval Timeline :</label>
                            <input type = "text" name = "re-eval" id="re-eval" class = "box" required/>
                        </div>
                        <div style="margin-bottom: 10px">
                            <label for="firstSteps">How many reasons to move to next step are there?</label>
                            <select  name="firstSteps" id="firstSteps" required>
                                <option disabled selected></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div><br/>
                        <div  id="step1Div" style="display: none">
                            <label for="step1">Reason to move to next step 1 :</label>
                            <input type = "text" name = "step1" id="step1" class = "box" />
                        </div>

                        <div  id="step2Div" style="display: none">
                            <label for="step2">Reason to move to next step 2 :</label>
                            <input type = "text" name = "step2" id="step2" class = "box" />
                        </div>

                        <div  id="step3Div" style="display: none">
                            <label for="step3">Reason to move to next step 3 :</label>
                            <input type = "text" name = "step3" id="step3" class = "box" />
                        </div>
                        <input class="submitLogin" type = "submit" value = " Submit "/>
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
<script src="../js/createAlgo.js"></script>
</html>

