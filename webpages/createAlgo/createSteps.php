<?php
$error="";
include_once("../php/session.php");
include_once("../php/jsonQuery.php");
include_once("../php/modifyJson.php");
$query = new jsonQuery();
$json = $query->getJson($_GET['name']);
if($_SERVER["REQUEST_METHOD"] == "POST") {
$edit = new modifyJson();
    if($_POST['firstSteps']!=0){
        switch ($_POST['firstSteps']){
            case 1:
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step1']);
                break;
            case 2:
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step1']);
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step2']);
                break;
            case 3:
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step1']);
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step2']);
                $json = $edit->modify($json,$_GET['level2'],$_GET['level3'],$_GET['level4'],$_POST['directions'],$_POST['re-eval'],$_POST['step3']);
                break;
            default:
                break;
        }
        $query->updateJson($json,$_GET['name']);

        if ($_GET['level3'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . $_GET["level2"] . "&level3=" . $_GET["level3"] . "&level4=".$_POST["firstSteps"]);
        } else if ($_GET['level2'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . $_GET["level2"] . "&level3=". $_POST["firstSteps"] . "&level4=0");
        } else if ($_GET['level1'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=". $_POST["firstSteps"] . "&level3=0" . "&level4=0");
        } else {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . $_GET["level2"] . "&level3=" . $_GET["level3"] . "&level4=" . ($_GET["level4"] - 1));
        }
    }else {
        if ($_GET['level4'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . $_GET["level2"] . "&level3=" . $_GET["level3"] . "&level4=" . ($_GET["level4"] - 1));
        } else if ($_GET['level3'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . $_GET["level2"] . "&level3=" . ($_GET["level3"] - 1) . "&level4=0");
        } else if ($_GET['level2'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . $_GET['level1'] . "&level2=" . ($_GET["level2"] - 1) . "&level3=0" . "&level4=0");
        } else if ($_GET['level1'] != 0) {
            header("location: createSteps.php?name=" . $_GET['name'] . "&level1=" . ($_GET['level1'] - 1) . "&level2=0" . "&level3=0" . "&level4=0");
        } else {

        }
    }

    //header("location: createSteps.php");
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Create New Treatment Algorithm Steps</title>

    <link rel="stylesheet" href="../css/global.css" type="text/css">
    <link rel="stylesheet" href="../css/indexHome.css" type="text/css">
    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <!-- Bootstrap library -->
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
                <div class="loginLabel"><b>Create Treatment Algorithm Steps for <?php echo $_GET['name']?></b></div>

                <div style="margin: 10px">

                    <form action = "" method = "post">
                        <div>
                            <label for="directions">Directions :</label>
                            <input type = "text" name = "directions" id="directions" class = "box" required/>
                        </div>
                        <div>
                            <label for="re-eval">Initial Re-Eval Timeline :</label>
                            <input type = "text" name = "re-eval" id="re-eval" class = "box" required/>
                        </div>
                        <div style="margin-bottom: 10px" id="ask">
                            <label for="firstSteps">How many reasons to move to next step are there?</label>
                            <select  name="firstSteps" id="firstSteps" required>
                                <option selected value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div id="error" style="display: none">
                            <label>Error: No more then 4 levels of abstraction supported</label>
                        </div>
                        <div  id="step1Div" style="display: none">
                            <label for="step1">1. Reason to move to next step:</label>
                            <input type = "text" name = "step1" id="step1" class = "box" />
                        </div>

                        <div  id="step2Div" style="display: none">
                            <label for="step2">2. Reason to move to next step:</label>
                            <input type = "text" name = "step2" id="step2" class = "box" />
                        </div>

                        <div  id="step3Div" style="display: none">
                            <label for="step3">3. Reason to move to next step:</label>
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
<script type="text/javascript">
    var books = JSON.parse( '<?php echo json_encode($json); ?>' );
    console.log(books);
</script>
<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</body>
<script src="../js/createSteps.js"></script>
</html>


