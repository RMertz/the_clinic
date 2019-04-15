<?php


class getAlgoName
{

    public function __construct(){

    }

    public function getName($id){
        include 'Config.php';
        $check = $db->prepare("SELECT `name` FROM `Algorithm` WHERE `AlgorithmID` = :id");
        $check->bindParam(":id", $id);
        try {
            $check->execute();
            $name = $check->fetch(PDO::FETCH_ASSOC);
            return $name['name'];
        }catch (PDOException $po) {
            return "Error: Json not added";
        }

    }

}