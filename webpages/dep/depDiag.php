<?php
include('../php/session.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];
    $total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9;
    header("location: depPHQAnalysis.php?id=".$_GET['id']."&total=".$total."&q10=".$q10);
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
                            <td>1. Little interest or plesure in doing things.</td>
                            <td><input type="radio" name="q1" value="0" checked></td>
                            <td><input type="radio" name="q1" value="1"></td>
                            <td><input type="radio" name="q1" value="2"></td>
                            <td><input type="radio" name="q1" value="3"></td>
                        </tr>
                        <tr>
                            <td>2. Feeling down, depressed or hopeless.</td>
                            <td><input type="radio" name="q2" value="0" checked></td>
                            <td><input type="radio" name="q2" value="1"></td>
                            <td><input type="radio" name="q2" value="2"></td>
                            <td><input type="radio" name="q2" value="3"></td>
                        </tr>
                        <tr>
                            <td>3. Trouble falling asleep, staying asleep or sleeping too much.</td>
                            <td><input type="radio" name="q3" value="0" checked></td>
                            <td><input type="radio" name="q3" value="1"></td>
                            <td><input type="radio" name="q3" value="2"></td>
                            <td><input type="radio" name="q3" value="3"></td>
                        </tr>
                        <tr>
                            <td>4. Feeling tired or	having little energy</td>
                            <td><input type="radio" name="q4" value="0" checked></td>
                            <td><input type="radio" name="q4" value="1"></td>
                            <td><input type="radio" name="q4" value="2"></td>
                            <td><input type="radio" name="q4" value="3"></td>
                        </tr>
                        <tr>
                            <td>5. Poor appetite or overeating</td>
                            <td><input type="radio" name="q5" value="0" checked></td>
                            <td><input type="radio" name="q5" value="1"></td>
                            <td><input type="radio" name="q5" value="2"></td>
                            <td><input type="radio" name="q5" value="3"></td>
                        </tr>
                        <tr>
                            <td>6. Feeling bad about yourself - or that you are a failure - or have let yourself or your family down.</td>
                            <td><input type="radio" name="q6" value="0" checked></td>
                            <td><input type="radio" name="q6" value="1"></td>
                            <td><input type="radio" name="q6" value="2"></td>
                            <td><input type="radio" name="q6" value="3"></td>
                        </tr>
                        <tr>
                            <td>7. Trouble concentrating on things such as reading the newspaper or watching TV.</td>
                            <td><input type="radio" name="q7" value="0" checked></td>
                            <td><input type="radio" name="q7" value="1"></td>
                            <td><input type="radio" name="q7" value="2"></td>
                            <td><input type="radio" name="q7" value="3"></td>
                        </tr>
                        <tr>
                            <td>8. Moving or speaking so slowly that other people could not have noticed. Or, the opposite - being so fidgety or restless that you have been moving around a lot more than usual.</td>
                            <td><input type="radio" name="q8" value="0" checked></td>
                            <td><input type="radio" name="q8" value="1"></td>
                            <td><input type="radio" name="q8" value="2"></td>
                            <td><input type="radio" name="q8" value="3"></td>
                        </tr>
                        <tr>
                            <td>9. Thought that you would be better off being dead or hurting yourself in some way.</td>
                            <td><input type="radio" name="q9" value="0" checked></td>
                            <td><input type="radio" name="q9" value="1"></td>
                            <td><input type="radio" name="q9" value="2"></td>
                            <td><input type="radio" name="q9" value="3"></td>
                        </tr>
                    </table><br/><br/>
                        <table style="width:100%">
                            <tr>
                                <th></th>
                                <th>Not difficult at all</th>
                                <th>Somewhat difficult</th>
                                <th>Very difficult</th>
                                <th>Extremely difficult</th>
                            </tr>
                            <tr>
                                <td>10. If you checked off any problems, how difficult have those problems made it for you to do your work, take car of things at home, or get along with other people?</td>
                                <td><input type="radio" name="q10" value="1" checked></td>
                                <td><input type="radio" name="q10" value="2"></td>
                                <td><input type="radio" name="q10" value="3"></td>
                                <td><input type="radio" name="q10" value="4"></td>
                            </tr>
                    </table><br/><br/>


                    <input type = "submit" value = " Submit PHQ "/><br />
                </form>
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

