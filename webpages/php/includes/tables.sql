// PatientInformation Table
CREATE TABLE IF NOT EXISTS `mydb`.`PatientInformation` (
  `PatientID` INT NULL,
  `FirstName` VARCHAR(30) NOT NULL,
  `Surname` VARCHAR(30) NOT NULL,
  `Diagnosis` VARCHAR(45) NOT NULL,
  `MedicationID` INT NOT NULL AUTO_INCREMENT,
  `CurrentDose` VARCHAR(15) NULL,
  `LastVisit` DATE NULL,
  `NextVisit` DATE NULL,
  `DoctorID` INT NULL,
  PRIMARY KEY (`PatientID`),
  UNIQUE INDEX `PatientID_UNIQUE` (`PatientID` ASC) VISIBLE,
  UNIQUE INDEX `MedicationID_UNIQUE` (`MedicationID` ASC) VISIBLE,
  INDEX `DoctorID_idx` (`DoctorID` ASC) VISIBLE,
  CONSTRAINT `DoctorID`
    FOREIGN KEY (`DoctorID`)
    REFERENCES `mydb`.`DoctorInformation` (`DoctorID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `MedicationID`
    FOREIGN KEY (`MedicationID`)
    REFERENCES `mydb`.`MedicationInformation` (`MedicationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

// DoctorInformation Table
CREATE TABLE IF NOT EXISTS `mydb`.`DoctorInformation` (
  `DoctorID` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(30) NOT NULL,
  `LastName` VARCHAR(30) NOT NULL,
  `PatientID` INT NULL,
  `Username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DoctorID`),
  UNIQUE INDEX `DoctorID_UNIQUE` (`DoctorID` ASC) VISIBLE,
  INDEX `PatientID_idx` (`PatientID` ASC) VISIBLE,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) VISIBLE,
  CONSTRAINT `PatientID`
    FOREIGN KEY (`PatientID`)
    REFERENCES `mydb`.`PatientInformation` (`PatientID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

// MedicationInformation Table
CREATE TABLE IF NOT EXISTS `mydb`.`MedicationInformation` (
  `MedicationID` INT NOT NULL AUTO_INCREMENT COMMENT 'The ID of each drug.',
  `MinimumDosage` MEDIUMTEXT NULL COMMENT 'The smallest dose for each drug',
  `MaximumDosage` MEDIUMTEXT NULL COMMENT 'The largest dose for each drug.',
  `Diagnosis` MEDIUMTEXT NULL COMMENT 'The diagnosis the drug is used for.',
  `Conflicting Medication` INT NULL,
  PRIMARY KEY (`MedicationID`),
  UNIQUE INDEX `MedicationID_UNIQUE` (`MedicationID` ASC) VISIBLE)

// ConflictingMedication Table
CREATE TABLE IF NOT EXISTS `mydb`.`ConflictingMedication` (
  `ConflictingID` INT NOT NULL AUTO_INCREMENT,
  `MedicationID` INT NULL,
  PRIMARY KEY (`ConflictingID`),
  INDEX `MedicationID_idx` (`MedicationID` ASC) VISIBLE,
  CONSTRAINT `MedicationID`
    FOREIGN KEY (`MedicationID`)
    REFERENCES `mydb`.`MedicationInformation` (`MedicationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
