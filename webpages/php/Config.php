<?php
try {
    $db = new PDO('mysql:host=localhost:8889;dbname=group2', 'Chris', 'QZJMsrM37LQCwhoD',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(PDOException $ex){
    echo("Can't open the database.");
}
?>
