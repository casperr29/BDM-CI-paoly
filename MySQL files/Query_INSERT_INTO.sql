USE `bdm_ci`;

INSERT INTO `usuario`
(`Correo`,
`Nickname`,
`Contrasenia`,
`Nombre`,
`FechaNacimiento`
)
VALUES
('superadmin@admin.com', 'superadmin', 'Admin!123', 'superadmin', '2022-10-19'),
('admin1@admin.com', 'admin1', 'Admin!123', 'admin1', '2022-10-19');

UPDATE `usuario`
SET `Rol` = 'superadministrador'
WHERE `UsuarioID` = 1;

UPDATE `usuario`
SET `Rol` = 3
WHERE `UsuarioID` = 2;








