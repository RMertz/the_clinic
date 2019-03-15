<?php
include('../php/session.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $answers = array($_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5'],$_POST['q6'],$_POST['q7'],$_POST['q8'],$_POST['q9']);
    $total=0;
    $totalPoints=0;
    for ($i = 0; $i < 8; $i++){
        if($answers[$i]>1){
            $total++;
            $totalPoints+=$answers[$i];
        }
    }
    if($answers[0]>1||$answers[1]>1){
        $q1=1;
    }else{
        $q1=0;
    }
    if($answers[8]>0){
        $total++;
    }
    if($total>=5){
        $total=1;
    }else{
        $total=0;
    }
    if($_POST['q10']>0){
        $q3=1;
    }else{
        $q3=0;
    }
    if($answers[7]>0){
        $q9=1;
    }else{
        $q9=0;
    }
    if (isset($_POST['Initial'])) {
        header("location: depPHQAnalysis.php?id=" . $_GET['id'] . "&q2=" . $total . "&q3=" . $q3 . "&q1=" . $q1."&type=0"."&total=".$totalPoints."&q9=".$q9); //type 0 = initial diagnosis
    }else{
        header("location: depPHQAnalysis.php?id=" . $_GET['id'] . "&q2=" . $total . "&q3=" . $q3 . "&q1=" . $q1."&type=1"."&total=".$totalPoints."&q9=".$q9); //type 1 = continuing treatment
    }
}
	$activePage = basename($_SERVER['PHP_SELF'], ".php");
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
    <div class="header">
    <div class=headerRow">
        <div class= "column left">
            <h1>The Clinician's Guide</h1>
        </div>
        <div class= "column right">
            <div id="headerLogo">
                <img src="../images/HeaderImageOutline.png" alt="HeaderImage">
            </div>
        </div>
    </div>
</div>

    <div class="navBar">
        <a class="<?= ($activePage == 'welcome') ? 'active':''; ?>" href="../welcome.php">Home</a>
        <a class="<?= ($activePage == 'patientList') ? 'active':''; ?>" href="../patientList.php">Your Patients</a>
        <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "depHome.php?id=".$_GET['id'];?>>Depression Treatment</a>
        <a class="<?= ($activePage == 'depDiag') ? 'active':''; ?>" href=<?php echo "depDiag.php?id=".$_GET['id'];?>>Depression PHQ</a>
        <a ID="logoutButton"href = "../php/logout.php">Sign Out</a>
    </div>
	
        <div class="row">
        <div >
            <h2 >
                Stub for patient health questionnaire form.<br>
            </h2>

            <div style = "margin:30px">

                <form action = "" method = "post">
                    <table style="width:100% text-align: left;">
                        <tr>
                            <th style="width: 75%; font-size: 1.5em;">Over the past 2 weeks, how often have you been bothered by any of the following problems?</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                        </tr>
                        <tr>
                            <td class="prompt">1. Little interest or pleasure in doing things.</td>
                            <td><input type="radio" class="radio" name="q1" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q1" value="1"></td>
                            <td><input type="radio" class="radio" name="q1" value="2"></td>
                            <td><input type="radio" class="radio" name="q1" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">2. Feeling down, depressed or hopeless.</td>
                            <td><input type="radio" class="radio" name="q2" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q2" value="1"></td>
                            <td><input type="radio" class="radio" name="q2" value="2"></td>
                            <td><input type="radio" class="radio" name="q2" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">3. Trouble falling asleep, staying asleep or sleeping too much.</td>
                            <td><input type="radio" class="radio" name="q3" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q3" value="1"></td>
                            <td><input type="radio" class="radio" name="q3" value="2"></td>
                            <td><input type="radio" class="radio" name="q3" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">4. Feeling tired or	having little energy</td>
                            <td><input type="radio" class="radio" name="q4" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q4" value="1"></td>
                            <td><input type="radio" class="radio" name="q4" value="2"></td>
                            <td><input type="radio" class="radio" name="q4" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">5. Poor appetite or overeating</td>
                            <td><input type="radio" class="radio" name="q5" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q5" value="1"></td>
                            <td><input type="radio" class="radio" name="q5" value="2"></td>
                            <td><input type="radio" class="radio" name="q5" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">6. Feeling bad about yourself - or that you are a failure - or have let yourself or your family down.</td>
                            <td><input type="radio" class="radio" name="q6" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q6" value="1"></td>
                            <td><input type="radio" class="radio" name="q6" value="2"></td>
                            <td><input type="radio" class="radio" name="q6" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">7. Trouble concentrating on things such as reading the newspaper or watching TV.</td>
                            <td><input type="radio" class="radio" name="q7" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q7" value="1"></td>
                            <td><input type="radio" class="radio" name="q7" value="2"></td>
                            <td><input type="radio" class="radio" name="q7" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">8. Moving or speaking so slowly that other people could not have noticed. Or, the opposite - being so fidgety or restless that you have been moving around a lot more than usual.</td>
                            <td><input type="radio" class="radio" name="q8" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q8" value="1"></td>
                            <td><input type="radio" class="radio" name="q8" value="2"></td>
                            <td><input type="radio" class="radio" name="q8" value="3"></td>
                        </tr>
                        <tr>
                            <td class="prompt">9. Thought that you would be better off being dead or hurting yourself in some way.</td>
                            <td><input type="radio" class="radio" name="q9" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q9" value="1"></td>
                            <td><input type="radio" class="radio" name="q9" value="2"></td>
                            <td><input type="radio" class="radio" name="q9" value="3"></td>
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
                                <td class="prompt">10. If you checked off any problems, how difficult have those problems made it for you to do your work, take care of things at home, or get along with other people?</td>
                                <td><input type="radio" class="radio" name="q10" value="0" checked></td>
                                <td><input type="radio" class="radio" name="q10" value="1"></td>
                                <td><input type="radio" class="radio" name="q10" value="2"></td>
                                <td><input type="radio" class="radio" name="q10" value="3"></td>
                            </tr>
                    </table><br/><br/>

					<div style=" text-align: center">
                    <input type = "submit" class="submit" name="Initial" value = " Submit PHQ For Initial Diagnosis and Treatment "/>
                    <input type = "submit" class="submit" name="Continuing" value = " Submit PHQ For Continuing Treatment "/><br />
					</div>
				</form>
            </div>
        </div>
    </div>
</body>

<div class="footer">
    <a href="https://github.com/RMertz/the_clinic.git">Repository</a>
</div>

</html>

