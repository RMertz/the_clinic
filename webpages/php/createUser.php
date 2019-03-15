<?php


class createUser
{
    public function __construct()
    {

    }

    public function addDoctor($myusername, $lastname, $firstname,$passwd)
    {
        include 'Config.php';
        $check = $db->prepare("SELECT DoctorID FROM `DoctorInformation` WHERE LastName = :lastname and Username = :username and FirstName = :firstname");
        $check->bindParam(":firstname", $firstname);
        $check->bindParam(":lastname", $lastname);
        $check->bindParam(":username", $myusername);
        $check->execute();
        if ($check->rowCount() == 1) {
            return "Sorry that combination already exists";
        } else {
            $doctor = $db->prepare("INSERT INTO `DoctorInformation` (`DoctorID`, `FirstName`, `LastName`, `PatientID`, `Username`, `Password`) VALUES (NULL, :firstname, :lastname, NULL, :username, :passwd)");
            $doctor->bindParam(":firstname", $firstname);
            $doctor->bindParam(":lastname", $lastname);
            $doctor->bindParam(":username", $myusername);
            $doctor->bindParam(":passwd", $passwd);
            try {
                $doctor->execute();
            }catch (PDOException $po) {
                return "Error: Doctor not created";
            }
            return "Success!";
        }
    }

    public function addPatient($doctorID, $lastname, $firstname,$diagnosis){
        include 'Config.php';
        $check = $db->prepare("SELECT DoctorID FROM `PatientInformation` WHERE Surname = :lastname and DoctorID = :doctorid and FirstName = :firstname");
        $check->bindParam(":firstname", $firstname);
        $check->bindParam(":lastname", $lastname);
        $check->bindParam(":doctorid", $doctorID);
        $check->execute();
        if ($check->rowCount() == 1){
            return "Sorry that combination already exists";
        }else {
            $doctor = $db->prepare("INSERT INTO `PatientInformation` (`PatientID`, `FirstName`, `Surname`, `Diagnosis`, `MedicationID`, `CurrentDose`, `LastVisit`, `NextVisit`, `DoctorID`) VALUES (NULL, :firstname, :lastname, :diagnosis, NULL, NULL, NULL, NULL, :doctorid);");
            $doctor->bindParam(":firstname", $firstname);
            $doctor->bindParam(":lastname", $lastname);
            $doctor->bindParam(":doctorid", $doctorID);
            $doctor->bindParam(":diagnosis", $diagnosis);
            $doctor->execute();
            try {
                $doctor->execute();
            }catch (PDOException $po) {
                return "Error: patient not created";
            }
            return "Success!";
        }
    }

}
