USE `bdm_ci`;
DROP procedure IF EXISTS `sp_RegistroUsuario`;

DELIMITER $$
USE `bdm_ci`$$
CREATE PROCEDURE `sp_RegistroUsuario` (
IN `pCorreo` VARCHAR(60),
IN `pNickname` VARCHAR(45),
IN `pContrasenia` VARCHAR(45),
IN `pNombre` VARCHAR(255),
IN `pFechaNacimiento` DATE
)
BEGIN
INSERT INTO `usuario`
(`Correo`,
`Nickname`,
`Contrasenia`,
`Nombre`,
`FechaNacimiento`
)
VALUES
(pCorreo,
pNickname,
pContrasenia,
pNombre,
pFechaNacimiento);
END$$

DELIMITER ;

