<?php
try {
    $dsn = 'mysql:dbname=test;host = 127i.0.0.1;charset=utf8';
    $db = new PDO($dsn, 'travis', '');
}catch(PDOException $ex){
    echo "<script>console.log('Failed to open database')</script>";
}
?>
