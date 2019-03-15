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
            $doctor->execute();
            return "Sucess!";
        }
    }

    public function addPatient($doctorID, $lastname, $firstname){
        $check = $db->prepare("SELECT DoctorID FROM `PatientInformation` WHERE Surname = :lastname and DoctorID = :doctorid and FistName = :firstname");
        $check->bindParam(":firstname", $firstname);
        $check->bindParam(":lastname", $lastname);
        $check->bindParam(":doctorid", $doctorID);
        $check->execute();
        if ($check->rowCount() == 1){
            return "Sorry that combination already exists";
        }else {
            $doctor = $db->prepare("INSERT INTO `PatientInformation` (`PatientID`, `FirstName`, `Surname`, `Diagnosis`, `MedicationID`, `CurrentDose`, `LastVisit`, `NextVisit`, `DoctorID`) VALUES (NULL, :firstname, :lastname, '', NULL, NULL, NULL, NULL, :doctorid);");
            $doctor->bindParam(":firstname", $firstname);
            $doctor->bindParam(":lastname", $lastname);
            $doctor->bindParam(":doctorid", $doctorID);
            $doctor->execute();
            return "Sucess!";
        }
    }

}
