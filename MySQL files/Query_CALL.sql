USE bdm_ci;

CALL sp_RegistroUsuario('usuario1@user.com', 'usuario1', 'usuario!123', 'usuario', '2022-10-19');
CALL sp_RegistroUsuario('vendedor1@user.com', 'vendedor1', 'vendedor!123', 'vendedor', '2022-10-19');

CALL sp_InicioSesion('usuario1@user.com', NULL, 'usuario!123');
CALL sp_InicioSesion(NULL, 'vendedor1', 'vendedor!123');

CALL sp_PerfilUsuario(3,1);
CALL sp_PerfilUsuario(4,1);

UPDATE `usuario`
SET `Rol` = 2
WHERE `UsuarioID` = 4;