<?php

include('session.php');
include('scheduleVisit.php');
include ('pHQAnalysis.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $schedule = new scheduleVisit($_GET['id']);
    if($schedule->schedule($_POST['Date'])){
        $error = "Next Visit Added.";
    }else{
        $error="Next Visit Not Added, Please Select a Valid Date.";
    }
}
