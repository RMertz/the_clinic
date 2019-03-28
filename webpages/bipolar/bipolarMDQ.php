<?php
include('../php/session.php');
include('../php/MDQLogic.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $diag = new MDQLogic();
    $answers = array($_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5'],$_POST['q6'],$_POST['q7'],$_POST['q8'],$_POST['q9'],$_POST['q10'],$_POST['q11'],$_POST['q12'],$_POST['q13'],$_POST['q14'],$_POST['q15']);
    $answers = $diag->getAnswers($answers);
    if (isset($_POST['Initial'])) {
        header("location: MDQAnalysis.php?id=" . $_GET['id'] . "&q2=" . $answers['q2'] . "&q3=" . $answers['q3'] . "&q1=" . $answers['total']); //type 0 = initial diagnosis
    }
}
	$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<html>

<head>
    <title><?php
        echo "Bipolar MDQ";
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
        <a class="<?= ($activePage == 'patientHome') ? 'active':''; ?>" href=<?php echo "patientHome.php?id=".$_GET['id'];?>>Patient Home</a>
        <a class="<?= ($activePage == 'depHome') ? 'active':''; ?>" href=<?php echo "bipolarHome.php?id=".$_GET['id'];?>>Bipolar Treatment</a>
        <a class="<?= ($activePage == 'depDiag') ? 'active':''; ?>" href=<?php echo "bipolarMDQ.php?id=".$_GET['id'];?>>Bipolar MDQ</a>
        <a ID="logoutButton"href = "../php/logout.php">Sign Out</a>
    </div>
	
        <div class="row">
        <div >
            <h2 >
                Mood Disorder Questionnaire<br>
            </h2>

            <div style = "margin:30px">

                <form action = "" method = "post">
                    <table style="width:100% text-align: left;">
                        <tr>
                            <th style="width: 75%; font-size: 1.5em;">Has there ever been a period of time when you were not your usual self and...</th>
                            <th>No</th>
                            <th>Yes</th>
                        </tr>
                        <tr>
                            <td class="prompt">...you felt so good or so hyper that other people thought you were not
                                your normal self or you were so hyper that you got into trouble?</td>
                            <td><input type="radio" class="radio" name="q1" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q1" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were so irritable that you shouted at people or started fights or arguments?</td>
                            <td><input type="radio" class="radio" name="q2" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q2" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you felt much more self-confident than usual?</td>
                            <td><input type="radio" class="radio" name="q3" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q3" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you got much less sleep than usual and found that you didn’t really miss it?</td>
                            <td><input type="radio" class="radio" name="q4" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q4" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were more talkative or spoke much faster than usual?</td>
                            <td><input type="radio" class="radio" name="q5" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q5" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...thoughts raced through your head or you couldn’t slow your mind down?</td>
                            <td><input type="radio" class="radio" name="q6" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q6" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were so easily distracted by things around you that you had trouble concentrating or staying on track?</td>
                            <td><input type="radio" class="radio" name="q7" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q7" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you had more energy than usual?</td>
                            <td><input type="radio" class="radio" name="q8" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q8" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were much more active or did many more things than usual?</td>
                            <td><input type="radio" class="radio" name="q9" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q9" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were much more social or outgoing than usual, for example you telephoned friends in the middle of the night?</td>
                            <td><input type="radio" class="radio" name="q10" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q10" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you were much more interested in sex than usual?</td>
                            <td><input type="radio" class="radio" name="q11" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q11" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...you did things that were unusual for you or that other people might have thought were excessive, foolish or risky?</td>
                            <td><input type="radio" class="radio" name="q12" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q12" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">...spending money got you or your family in trouble?</td>
                            <td><input type="radio" class="radio" name="q13" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q13" value="1"></td>
                        </tr>
                        <tr>
                            <td class="prompt">If you checked YES to more than one of the above, have several of these ever happened during the same period of time?</td>
                            <td><input type="radio" class="radio" name="q14" value="0" checked></td>
                            <td><input type="radio" class="radio" name="q14" value="1"></td>
                        </tr>
                    </table><br/><br/>
                        <table style="width:100%">
                            <tr>
                                <th></th>
                                <th>No Problems</th>
                                <th>Minor Problem</th>
                                <th>Moderate Problem</th>
                                <th>Serious Problem</th>
                            </tr>
                            <tr>
                                <td class="prompt">How much of a problem did any of these cause you – like being unable to work; having family, money or legal troubles; getting into arguments or fights?</td>
                                <td><input type="radio" class="radio" name="q15" value="0" checked></td>
                                <td><input type="radio" class="radio" name="q15" value="1"></td>
                                <td><input type="radio" class="radio" name="q15" value="2"></td>
                                <td><input type="radio" class="radio" name="q15" value="3"></td>
                            </tr>
                    </table><br/><br/>

					<div style=" text-align: center">
                    <input type = "submit" class="submit" name="Initial" value = " Submit MDQ For Initial Diagnosis and Treatment "/>
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

