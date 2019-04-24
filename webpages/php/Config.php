<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=group1', 'group1', 'db4Group1blue',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(PDOException $ex){
    echo("<script> console.log('Can not open database') </script>");
}
?>
