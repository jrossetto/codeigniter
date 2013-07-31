SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `erp`.`funcionarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `erp`.`funcionarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `cargo` VARCHAR(45) NULL ,
  `data_admissao` DATETIME NULL ,
  `foto` VARCHAR(45) NULL ,
  `senha` VARCHAR(50) NULL ,
  `perfil` INT NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `erp`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `erp`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(1) NULL ,
  `nome` VARCHAR(45) NULL ,
  `razao_social` VARCHAR(45) NULL ,
  `cpf` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  `rg` VARCHAR(45) NULL ,
  `ie` VARCHAR(45) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `numero` INT NULL ,
  `complemento` VARCHAR(45) NULL ,
  `cep` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `telefone` VARCHAR(45) NULL ,
  `celular` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `conta_bancaria` VARCHAR(45) NULL ,
  `referencias` VARCHAR(45) NULL ,
  `data_cadastro` DATETIME NULL ,
  `ativo` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `erp`.`contratos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `erp`.`contratos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `data_inicio` DATETIME NULL ,
  `data_termino` DATETIME NULL ,
  `manutencao_preventiva` VARCHAR(45) NULL ,
  `data_mensalidades` VARCHAR(45) NULL ,
  `valor_anual` VARCHAR(45) NULL ,
  `valor_mensal` VARCHAR(45) NULL ,
  `qtd_equipamentos` VARCHAR(45) NULL ,
  `clientes_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `clientes_id`) ,
  INDEX `fk_contratos_clientes_idx` (`clientes_id` ASC) ,
  CONSTRAINT `fk_contratos_clientes`
    FOREIGN KEY (`clientes_id` )
    REFERENCES `erp`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `erp`.`fornecedores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `erp`.`fornecedores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `razao_social` VARCHAR(45) NULL ,
  `cnpj` VARCHAR(45) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `numero` INT NULL ,
  `complemento` VARCHAR(45) NULL ,
  `cep` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `conta_banco` VARCHAR(45) NULL ,
  `responsavel_contato` VARCHAR(45) NULL ,
  `contato_vendas` VARCHAR(45) NULL ,
  `contato_financeiro` VARCHAR(45) NULL ,
  `data_cadastro` VARCHAR(45) NULL ,
  `referencias` MEDIUMTEXT NULL ,
  `ativo` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
