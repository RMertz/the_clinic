<?php


class jsonQuery
{
    public function __construct(){

    }

    public function setJson($json, $name){
        include 'Config.php';
        $check = $db->prepare("SELECT `AlgorithmID` FROM `Algorithm` WHERE `name` = :nam");
        $check->bindParam(":nam", $name);
        try {
            $check->execute();
        }catch (PDOException $po) {
            return "Error: Json not added";
        }
        if ($check->rowCount() != 0) {
            return "Sorry that name already exists";
        }else {
            $add = $db->prepare("INSERT INTO `Algorithm` (`json`, `name`) VALUES (:json, :nam)");
            $add->bindParam(":json", $json);
            $add->bindParam(":nam", $name);
            try {
                $add->execute();
            } catch (PDOException $po) {
                return "Error: Json not added";
            }
            return "Json Added";
        }
    }

    public function updateJson($json, $name){
        include 'Config.php';
        $add = "UPDATE `Algorithm` SET `json` =? WHERE `name` =?";
        $toAdd = $db->prepare($add);
        try {
            $toAdd->execute([json_encode($json), $name]);
            echo "<script>console.log('Json updated')</script>";
        }catch (PDOException $po) {
            echo "<script>console.log('Json not updated')</script>";
        }

    }

    public function getJson($name){
        include 'Config.php';
        $json = $db->prepare("SELECT `json` FROM `Algorithm` WHERE `name` = :nam");
        $json->bindParam(":nam", $name);
        try {
            $json->execute();
        }catch (PDOException $po) {
            return "Error: Json not found";
        }
        $realJson = $json->fetch(PDO::FETCH_ASSOC);
        return json_decode($realJson['json'],true);
    }

}