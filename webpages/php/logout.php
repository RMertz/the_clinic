<?php
session_start();

if(session_destroy()) {
    header("Location: webpages/login.php");
}
?>