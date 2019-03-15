<?php
try {
    $db = new PDO('mysql:host=localhost:8888;dbname=group1', 'Chris', 'QZJMsrM37LQCwhoD',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(PDOException $ex){
    echo "<script>console.log('Failed to open database')</script>";
}
?>
