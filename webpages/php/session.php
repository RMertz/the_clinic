<?php
include $_SERVER['DOCUMENT_ROOT']."/group1/the_clinic/webpages/php/Config.php";
session_start();

$user_check = $_SESSION['login_user'];


if(!isset($_SESSION['login_user'])){
    session_unset();
    session_destroy();
    header("location:../Login.php");
    die();
}
?>