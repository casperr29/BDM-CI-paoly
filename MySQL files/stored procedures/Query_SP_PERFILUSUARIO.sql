USE `bdm_ci`;
DROP procedure IF EXISTS `sp_PerfilUsuario`;

DELIMITER $$
USE `bdm_ci`$$
CREATE PROCEDURE `sp_PerfilUsuario` (
IN `pUsuarioID` TINYINT,
IN `pRol` ENUM('comprador', 'vendedor', 'administrador', 'superadministrador')
)
BEGIN
IF pRol='comprador' THEN
	SELECT `Correo` as Correo,
		`Nickname` as 'Nombre de usuario',
		`Avatar` as 'Imagen de perfil',
		`Nombre`,
		`FechaNacimiento` as 'Fecha de nacimiento',
		`FechaAdmision`as 'Fecha de registro',
		`Privacidad`
	FROM `usuario`
    WHERE `UsuarioID` = pUsuarioID AND `Rol`= pRol;
END IF;
IF pRol='vendedor' THEN
	SELECT `Correo` as ID,
		`Nickname` as 'Nombre de usuario',
		`Avatar` as 'Imagen de perfil',
		`Nombre`,
		`FechaNacimiento` as 'Fecha de nacimiento',
		`FechaAdmision`as 'Fecha de registro',
		`Privacidad`
	FROM `usuario`
    WHERE `UsuarioID` = pUsuarioID AND `Rol`= pRol;
END IF;
END$$

DELIMITER ;
