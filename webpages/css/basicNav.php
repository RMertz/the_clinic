<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<div class="navBar">
    <a class="<?= ($activePage == 'index') ? 'active':''; ?>" href=<?php echo "/group1/the_clinic/webpages/index.php"?>>Home</a>
    <a class="<?= ($activePage == 'help') ? 'active':''; ?>"href=<?php echo "/group1/the_clinic/webpages/help.php"?>>Help</a>
    <a id="logoutButton" href = "/group1/the_clinic/webpages/Login.php">Sign In</a>
</div>
