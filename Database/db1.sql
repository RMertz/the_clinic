-- MySQL Script generated by MySQL Workbench
-- Tue Feb 26 19:09:42 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema group1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema group1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `group1` DEFAULT CHARACTER SET utf8 ;
USE `group1` ;

-- -----------------------------------------------------
-- Table `group1`.`DoctorInformation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group1`.`DoctorInformation` (
  `DoctorID` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(30) NOT NULL,
  `LastName` VARCHAR(30) NOT NULL,
  `PatientID` INT NULL,
  `Username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DoctorID`),
  UNIQUE INDEX `DoctorID_UNIQUE` (`DoctorID` ASC) ,
  INDEX `PatientID_idx` (`PatientID` ASC) ,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `group1`.`MedicationInformation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group1`.`MedicationInformation` (
  `MedicationID` INT NOT NULL AUTO_INCREMENT COMMENT 'The ID of each drug.',
  `MinimumDosage` MEDIUMTEXT NULL COMMENT 'The smallest dose for each drug',
  `MaximumDosage` MEDIUMTEXT NULL COMMENT 'The largest dose for each drug.',
  `Diagnosis` MEDIUMTEXT NULL COMMENT 'The diagnosis the drug is used for.',
  `Conflicting Medication` INT NULL,
  PRIMARY KEY (`MedicationID`),
  UNIQUE INDEX `MedicationID_UNIQUE` (`MedicationID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `group1`.`PatientInformation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group1`.`PatientInformation` (
  `PatientID` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(30) NOT NULL,
  `Surname` VARCHAR(30) NOT NULL,
  `Diagnosis` VARCHAR(45) NOT NULL,
  `MedicationID` INT NOT NULL,
  `CurrentDose` VARCHAR(15) NULL,
  `LastVisit` DATE NULL,
  `NextVisit` DATE NULL,
  `DoctorID` INT NULL,
  PRIMARY KEY (`PatientID`),
  UNIQUE INDEX `PatientID_UNIQUE` (`PatientID` ASC) ,
  UNIQUE INDEX `MedicationID_UNIQUE` (`MedicationID` ASC) ,
  INDEX `DoctorID_idx` (`DoctorID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `group1`.`Conflicting Medication`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `group1`.`Conflicting Medication` (
  `ConflictingID` INT NOT NULL AUTO_INCREMENT,
  `MedicationID` INT NULL,
  PRIMARY KEY (`ConflictingID`),
  INDEX `MedicationID_idx` (`MedicationID` ASC))
  
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
