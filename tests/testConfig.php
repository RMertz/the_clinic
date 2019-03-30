<?php
try {
    $dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
    $db = new PDO($dsn, 'travis', '');
}catch(PDOException $ex){
    echo "<script>console.log('Failed to open database')</script>";
}
?>
