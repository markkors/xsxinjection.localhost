<?php
	require_once "database.php";

	function resetDatabase() {
		global $con;
		
		$sql = "
			-- MySQL Workbench Forward Engineering

			SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
			SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
			SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

			-- -----------------------------------------------------
			-- Schema XSS
			-- -----------------------------------------------------
			DROP SCHEMA IF EXISTS `XSS` ;

			-- -----------------------------------------------------
			-- Schema XSS
			-- -----------------------------------------------------
			CREATE SCHEMA IF NOT EXISTS `XSS` DEFAULT CHARACTER SET utf8 ;
			USE `XSS` ;

			-- -----------------------------------------------------
			-- Table `XSS`.`message`
			-- -----------------------------------------------------
			DROP TABLE IF EXISTS `XSS`.`message` ;

			CREATE TABLE IF NOT EXISTS `XSS`.`message` (
			  `id` INT NOT NULL AUTO_INCREMENT,
			  `name` VARCHAR(100) NOT NULL,
			  `message` TEXT NOT NULL,
			  `message_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`))
			ENGINE = InnoDB;


			SET SQL_MODE=@OLD_SQL_MODE;
			SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
			SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

			-- -----------------------------------------------------
			-- Data for table `XSS`.`message`
			-- -----------------------------------------------------
			START TRANSACTION;
			USE `XSS`;
			INSERT INTO `XSS`.`message` (`id`, `name`, `message`, `message_date`) VALUES (DEFAULT, 'Willem', 'Welkom bij de XSS playground', '2017-12-01 10:23');

			COMMIT;";
	
		$con->exec($sql);
	}
	
?>