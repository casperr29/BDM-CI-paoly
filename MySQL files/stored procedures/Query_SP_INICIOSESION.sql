USE `bdm_ci`;
DROP procedure IF EXISTS `sp_InicioSesion`;

DELIMITER $$
USE `bdm_ci`$$
CREATE PROCEDURE `sp_InicioSesion` (
IN `pCorreo` VARCHAR(60),
IN `pNickname` VARCHAR(45),
IN `pContrasenia` VARCHAR(45)
)
BEGIN
SELECT 	`UsuarioID`,
		`Rol`
FROM `usuario`
WHERE (`Correo` = Correo OR `Nickname` = pNickname)
AND `Contrasenia` = pContrasenia
AND `Estatus_Usuario` = 1;
END$$

DELIMITER ;
