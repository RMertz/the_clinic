<?php
try {
    $db = new PDO('mysql:host=localhost:8889;dbname=group1', 'Chris1', 'Test123',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(PDOException $ex){
    echo "<script>console.log('Failed to open database')</script>";
}
?>
