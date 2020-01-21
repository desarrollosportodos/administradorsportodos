ALTER TABLE `user` ADD `user_typepople` INT(11) NULL AFTER `user_email`, ADD `user_typeid` VARCHAR(255) NULL AFTER `user_typepople`;

ALTER TABLE `elemento` CHANGE `unidadcompra` `alquiler` INT(11) NULL DEFAULT NULL;
ALTER TABLE `elemento` ADD `persona` INT(255) NULL AFTER `tipo`;
ALTER TABLE `elemento` ADD `tipo_espacio` INT(255) NULL AFTER `tipo`;
ALTER TABLE `elemento` ADD `estado` INT(11) NULL AFTER `id`;

ALTER TABLE `elemento` ADD `imagen` VARCHAR(500) NULL AFTER `persona`, ADD `descripcion` TEXT NULL AFTER `imagen`, ADD `tv` INT NULL AFTER `descripcion`, ADD `videobean` INT NULL AFTER `tv`, ADD `teleconferencia` INT NULL AFTER `videobean`;