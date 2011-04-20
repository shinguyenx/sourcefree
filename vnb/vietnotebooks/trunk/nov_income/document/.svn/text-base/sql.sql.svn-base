SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `zin_income` DEFAULT CHARACTER SET utf8 ;
USE `zin_income` ;

-- -----------------------------------------------------
-- Table `zin_income`.`zin_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `zin_income`.`zin_user` (
  `zin_user_id` INT NOT NULL AUTO_INCREMENT ,
  `zin_user_nickname` VARCHAR(100) NULL ,
  `zin_user_username` VARCHAR(100) NULL ,
  `zin_user_password` VARCHAR(100) NULL ,
  `zin_user_description` VARCHAR(300) NULL ,
  `zin_user_level` INT NULL ,
  PRIMARY KEY (`zin_user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zin_income`.`zin_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `zin_income`.`zin_product` (
  `zin_product_id` INT NOT NULL AUTO_INCREMENT ,
  `zin_product_name` VARCHAR(100) NULL ,
  `zin_product_price` FLOAT NULL ,
  `zin_product_time_updated` DATE NULL ,
  `zin_product_description` VARCHAR(300) NULL ,
  PRIMARY KEY (`zin_product_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zin_income`.`zin_history`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `zin_income`.`zin_history` (
  `zin_history_id` INT NOT NULL AUTO_INCREMENT ,
  `zin_user_ref` INT NOT NULL ,
  `zin_product_ref` INT NOT NULL ,
  `zin_history_total` FLOAT NULL ,
  `zin_history_description` VARCHAR(300) NULL ,
  `zin_history_type` INT NULL ,
  PRIMARY KEY (`zin_history_id`, `zin_user_ref`, `zin_product_ref`) ,
  INDEX `fk_zin_history_zin_user` (`zin_user_ref` ASC) ,
  INDEX `fk_zin_history_zin_product1` (`zin_product_ref` ASC) ,
  CONSTRAINT `fk_zin_history_zin_user`
    FOREIGN KEY (`zin_user_ref` )
    REFERENCES `zin_income`.`zin_user` (`zin_user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_zin_history_zin_product1`
    FOREIGN KEY (`zin_product_ref` )
    REFERENCES `zin_income`.`zin_product` (`zin_product_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
