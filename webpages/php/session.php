<?php
if((include "Config.php")){
}else{
    echo "nooo";
};
session_start();

$user_check = $_SESSION['login_user'];


if(!isset($_SESSION['login_user'])){
    session_unset();
    session_destroy();
    if(getcwd() == "/var/www/html/group1/the_clinic/webpages/bipolar/bipolarM"||getcwd() == "/var/www/html/group1/the_clinic/webpages/bipolar/bipolarD"){
        header("location:../../Login.php");
    }elseif (getcwd() == "/var/www/html/group1/the_clinic/webpages"){
        header("location:Login.php");
    }else{
        header("location:../Login.php");
    }
    die();
}
?>