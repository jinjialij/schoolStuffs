DROP SCHEMA IF EXISTS `cmaps` ;

-- -----------------------------------------------------
-- Schema cmaps
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cmaps` ;
USE `cmaps` ;

-- -----------------------------------------------------
-- Table `cmaps`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cmaps`.`course` (
  `courseCode` VARCHAR(255) NOT NULL,
  `courseTitle` VARCHAR(255) NOT NULL,
  `courseOutline` TEXT NULL DEFAULT NULL,
  `prerequisites` TEXT NULL DEFAULT NULL,
  `learningoutcomes` TEXT NULL DEFAULT NULL,
  `creditHrs` INT NULL,
  `evaluation` TEXT NULL DEFAULT NULL,
  `availability` VARCHAR(45) NULL,
  `program` VARCHAR(45) NULL,
--  FOREIGN KEY (`program`) REFERENCES `program`(`programCode`),
  PRIMARY KEY (`courseCode`));
  
  CREATE TABLE IF NOT EXISTS `cmaps`.`program` (
   `programName`     VARCHAR(256) NOT NULL,
   `programCode`     VARCHAR(12)   NOT NULL,
   `programOutline`  TEXT NOT NULL,
   PRIMARY KEY(`programCode`));

INSERT INTO `cmaps`.`program` (`programName`, `programCode`, `programOutline`) VALUES ('Health Promotion', 'HPRO', 'Health promotion is about encouraging the health and well-being of individuals and their communities. It draws from such diverse disciplines as communications, epidemiology, marketing, medicine, psychology, sociology, and statistics.');
INSERT INTO `cmaps`.`program` (`programName`, `programCode`, `programOutline`) VALUES ('Kinesiology','KINE','Health promotion is about encouraging the health and well-being of individuals and their communities. It draws from such diverse disciplines as communications, epidemiology, marketing, medicine, psychology, sociology, and statistics.');
INSERT INTO `cmaps`.`program` (`programName`, `programCode`, `programOutline`) VALUES ('Recreation Management','RECT','Health promotion is about encouraging the health and well-being of individuals and their communities. It draws from such diverse disciplines as communications, epidemiology, marketing, medicine, psychology, sociology, and statistics.');
INSERT INTO `cmaps`.`program` (`programName`, `programCode`, `programOutline`) VALUES ('Therapeutic Recreation','RECM','Health promotion is about encouraging the health and well-being of individuals and their communities. It draws from such diverse disciplines as communications, epidemiology, marketing, medicine, psychology, sociology, and statistics.');