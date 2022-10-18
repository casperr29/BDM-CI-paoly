CREATE SCHEMA IF NOT EXISTS BDM_CI; 
USE BDM_CI;

CREATE TABLE IF NOT EXISTS `usuario` (
  `UsuarioID` TINYINT NOT NULL AUTO_INCREMENT,
  `Correo` VARCHAR(60) NOT NULL,
  `Nickname` VARCHAR(45) NOT NULL COMMENT 'Nombre de usuario',
  `Contrasenia` VARCHAR(45) NOT NULL COMMENT 'Contraseña',
  `Rol` ENUM('comprador', 'vendedor', 'administrador', 'superadministrador') NOT NULL DEFAULT 'comprador' COMMENT 'El usuario inicia como comprador, despues puede convertirse en vendedor, admin o superadmin',
  `Avatar` BLOB NULL COMMENT 'Imagen de perfil',
  `Nombre` VARCHAR(255) NOT NULL COMMENT 'Nombre completo',
  `FechaNacimiento` DATE NOT NULL,
  `FechaAdmision` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de registro en la pagina',
  `Privacidad` BINARY NOT NULL DEFAULT 0 COMMENT 'Por default el perfil del usuario es publico',
  `Estatus_Usuario` BINARY NOT NULL DEFAULT 1 COMMENT 'Establece si el usuario esta activo',
  UNIQUE INDEX `Correo_UNIQUE` (`Correo` ASC) VISIBLE,
  UNIQUE INDEX `Nickname_UNIQUE` (`Nickname` ASC) VISIBLE,
  PRIMARY KEY (`UsuarioID`)
  );
  
  CREATE TABLE IF NOT EXISTS `lista` (
  `ListaID` TINYINT NOT NULL AUTO_INCREMENT,
  `Nombre_lista` VARCHAR(45) NOT NULL,
  `Descripcion_lista` VARCHAR(255) NOT NULL,
  `Imagen_lista` BLOB NULL COMMENT 'Portada de la lista',
  `Privacidad_lista` BINARY NOT NULL DEFAULT 0 COMMENT 'Por default la lista es publica',
  `Usuario_lista` TINYINT NOT NULL COMMENT 'Usuario que creo la lista',
  PRIMARY KEY (`ListaID`),
  INDEX `FK_Usuario_lista_idx` (`Usuario_lista` ASC) VISIBLE,
  CONSTRAINT `FK_Usuario_lista`
    FOREIGN KEY (`Usuario_lista`) REFERENCES `usuario` (`UsuarioID`)
    );
    
CREATE TABLE IF NOT EXISTS `categoria` (
  `CategoriaID` TINYINT NOT NULL AUTO_INCREMENT,
  `Nombre_categoria` VARCHAR(45) NOT NULL,
  `Descripcion_categoria` VARCHAR(255) NOT NULL,
  `Usuario_categoria` TINYINT NOT NULL COMMENT 'Usuario que creo la categoria',
  PRIMARY KEY (`CategoriaID`),
  UNIQUE INDEX `Nombre_categoria_UNIQUE` (`Nombre_categoria` ASC) VISIBLE,
  INDEX `FK_Usuario_categoria_idx` (`Usuario_categoria` ASC) VISIBLE,
  CONSTRAINT `FK_Usuario_categoria`
    FOREIGN KEY (`Usuario_categoria`) REFERENCES `usuario` (`UsuarioID`)
    );
    
CREATE TABLE IF NOT EXISTS `libro` (
  `LibroID` INT NOT NULL AUTO_INCREMENT,
  `Nombre_libro` VARCHAR(80) NOT NULL,
  `Descripcion_libro` TEXT NOT NULL,
  `Precio_libro` DECIMAL(10,2) NULL,
  `Para_cotizar` BINARY NOT NULL DEFAULT 0 COMMENT 'Si el usuario no pone un precio, el libro es para cotizar',
  `Valoracion` DECIMAL(4,2) NOT NULL DEFAULT 0 COMMENT 'Calificación promedio del libro',
  `Cantidad_vendida` INT NOT NULL DEFAULT 0,
  `Cantidad_disponibilidad` INT NOT NULL COMMENT 'Cantidad disponible en venta',
  `Autor_libro` VARCHAR(255) NOT NULL COMMENT 'Autor que publico el libro',
  `Anio_libro` YEAR NOT NULL COMMENT 'Año de publicación',
  `Estatus_libro` BINARY NULL COMMENT 'Define si el producto fue aprobado por el administrador',
  `Usuario_libro` TINYINT NOT NULL COMMENT 'Usuario que vende el libro',
  PRIMARY KEY (`LibroID`),
  INDEX `FK_Usuario_libro_idx` (`Usuario_libro` ASC) VISIBLE,
  CONSTRAINT `FK_Usuario_libro`
    FOREIGN KEY (`Usuario_libro`) REFERENCES `usuario` (`UsuarioID`)
	)
ENGINE = InnoDB
AUTO_INCREMENT = 1000;

CREATE TABLE IF NOT EXISTS `lista_libro` (
  `Lista_libroID` TINYINT NOT NULL AUTO_INCREMENT,
  `ListaID` TINYINT NOT NULL,
  `LibroID` INT NOT NULL,
  PRIMARY KEY (`Lista_libroID`),
  INDEX `FK_ListaID_idx` (`ListaID` ASC) VISIBLE,
  INDEX `FK_LibroIDLista_idx` (`LibroID` ASC) VISIBLE,
  CONSTRAINT `FK_ListaID`
    FOREIGN KEY (`ListaID`) REFERENCES `lista` (`ListaID`),
  CONSTRAINT `FK_LibroIDLista`
    FOREIGN KEY (`LibroID`) REFERENCES `libro` (`LibroID`)
    );
    
CREATE TABLE IF NOT EXISTS `categoria_libro` (
  `Categoria_libroID` TINYINT NOT NULL AUTO_INCREMENT,
  `CategoriaID` TINYINT NOT NULL,
  `LibroID` INT NOT NULL,
  PRIMARY KEY (`Categoria_libroID`),
  INDEX `FK_CategoriaID_idx` (`CategoriaID` ASC) VISIBLE,
  INDEX `FK_LibroIDcategoria_idx` (`LibroID` ASC) VISIBLE,
  CONSTRAINT `FK_CategoriaID`
    FOREIGN KEY (`CategoriaID`) REFERENCES `categoria` (`CategoriaID`),
  CONSTRAINT `FK_LibroIDcategoria`
    FOREIGN KEY (`LibroID`) REFERENCES `libro` (`LibroID`)
    );
    
CREATE TABLE IF NOT EXISTS `libro_carrito` (
  `Libro_CarritoID` INT NOT NULL AUTO_INCREMENT,
  `Precio_compra` DECIMAL(10,2) NOT NULL COMMENT 'Precio del producto en el momento en el que el usuario lo añade al carrito',
  `Cantidad_compra` INT NOT NULL COMMENT 'Cantidad de un solo producto para comprar',
  `LibroID` INT NOT NULL,
  PRIMARY KEY (`Libro_CarritoID`),
  INDEX `FK_LibroIDCarrito_idx` (`LibroID` ASC) VISIBLE,
  CONSTRAINT `FK_LibroIDCarrito`
    FOREIGN KEY (`LibroID`) REFERENCES `libro` (`LibroID`)
    );
    
CREATE TABLE IF NOT EXISTS `media` (
  `MediaID` TINYINT NOT NULL AUTO_INCREMENT,
  `Tipo` ENUM('imagen', 'video') NOT NULL COMMENT 'Tipo de archivo multimedia',
  `Contenido` BLOB NOT NULL COMMENT 'Archivo multimedia',
  `LibroID` INT NOT NULL,
  PRIMARY KEY (`MediaID`),
  INDEX `FK_LibroIDMultimedia_idx` (`LibroID` ASC) VISIBLE,
  CONSTRAINT `FK_LibroIDMultimedia`
    FOREIGN KEY (`LibroID`) REFERENCES `libro` (`LibroID`)
    );
    
CREATE TABLE IF NOT EXISTS `domicilio` (
  `DomicilioID` TINYINT NOT NULL AUTO_INCREMENT,
  `Calle` VARCHAR(25) NOT NULL,
  `Numero` INT NOT NULL,
  `Colonia` VARCHAR(25) NOT NULL,
  `Municipio` VARCHAR(25) NOT NULL,
  `CodigoPostal` INT NOT NULL,
  `Estado` VARCHAR(25) NOT NULL,
  `Pais` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`DomicilioID`)
  );
  
  CREATE TABLE IF NOT EXISTS `chat` (
  `ChatID` TINYINT NOT NULL AUTO_INCREMENT,
  `UsuarioComprador` TINYINT NOT NULL,
  `UsuarioVendedor` TINYINT NOT NULL,
  PRIMARY KEY (`ChatID`),
  INDEX `FK_UsuarioCompradorChat_idx` (`UsuarioComprador` ASC) VISIBLE,
  INDEX `FK_UsuarioVendedorChat_idx` (`UsuarioVendedor` ASC) VISIBLE,
  CONSTRAINT `FK_UsuarioCompradorChat`
    FOREIGN KEY (`UsuarioComprador`) REFERENCES `usuario` (`UsuarioID`),
  CONSTRAINT `FK_UsuarioVendedorChat`
    FOREIGN KEY (`UsuarioVendedor`) REFERENCES `libro` (`Usuario_libro`)
    );
    
CREATE TABLE IF NOT EXISTS `mensaje` (
  `MensajeID` INT NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(60) NOT NULL COMMENT 'Usuario que envio el mensaje',
  `Cotizacion` DECIMAL(10,2) NULL COMMENT 'Cantidad/precio que se ofrece por el producto',
  `Respuesta` BINARY NULL COMMENT 'Respuesta a la cotización, solo se tiene dos opciones una para aceptar y otra para rechazar la oferta',
  `ChatID` TINYINT NOT NULL,
  PRIMARY KEY (`MensajeID`),
  INDEX `FK_ChatIDMensaje_idx` (`ChatID` ASC) VISIBLE,
  CONSTRAINT `FK_ChatIDMensaje`
    FOREIGN KEY (`ChatID`) REFERENCES `chat` (`ChatID`)
    );

CREATE TABLE IF NOT EXISTS `carrito_valoracion` (
  `ValoracionID` INT NOT NULL AUTO_INCREMENT,
  `Calificacion` INT NOT NULL,
  `Comentario` TEXT NOT NULL,
  `Fecha_valoracion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Libro_CarritoID` INT NOT NULL,
  PRIMARY KEY (`ValoracionID`),
  INDEX `FK_LibroCarritoIDValoracion_idx` (`Libro_CarritoID` ASC) VISIBLE,
  CONSTRAINT `FK_LibroCarritoIDValoracion`
    FOREIGN KEY (`Libro_CarritoID`) REFERENCES `libro_carrito` (`Libro_CarritoID`)
    );

CREATE TABLE IF NOT EXISTS `caracteristica` (
  `CaracteristicaID` TINYINT NOT NULL AUTO_INCREMENT,
  `Nombre_caracteristica` VARCHAR(25) NOT NULL,
  `LibroID` INT NOT NULL,
  PRIMARY KEY (`CaracteristicaID`),
  INDEX `FK_LibroIDCaracteristica_idx` (`LibroID` ASC) VISIBLE,
  CONSTRAINT `FK_LibroIDCaracteristica`
    FOREIGN KEY (`LibroID`) REFERENCES `bdm_ci`.`libro` (`LibroID`)
    )
COMMENT = 'Caracteristicas extras de la edicion del producto: tipo de cubierta, color, etc.';

CREATE TABLE IF NOT EXISTS `carrito` (
  `CarritoID` INT NOT NULL AUTO_INCREMENT,
  `Estatus_Carrito` BINARY NOT NULL DEFAULT 0 COMMENT 'Establece si el carrito esta activo para el usuario',
  `UsuarioID` TINYINT NOT NULL,
  `LibroCarritoID` INT NOT NULL COMMENT 'Producto en el carrito',
  PRIMARY KEY (`CarritoID`),
  INDEX `FK_UsuarioIDCarrito_idx` (`UsuarioID` ASC) VISIBLE,
  INDEX `FK_LibroCarritoIDCarrito_idx` (`LibroCarritoID` ASC) VISIBLE,
  CONSTRAINT `FK_UsuarioIDCarrito`
    FOREIGN KEY (`UsuarioID`) REFERENCES `bdm_ci`.`usuario` (`UsuarioID`),
  CONSTRAINT `FK_LibroCarritoIDCarrito`
    FOREIGN KEY (`LibroCarritoID`) REFERENCES `bdm_ci`.`libro_carrito` (`Libro_CarritoID`)
    );

CREATE TABLE IF NOT EXISTS `orden` (
  `OrdenID` INT NOT NULL AUTO_INCREMENT,
  `PrecioTotal` DECIMAL(18,2) NOT NULL,
  `Fecha_orden` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estatus_orden` ENUM('en preparación', 'pendiente', 'entregado') NOT NULL DEFAULT 'pendiente' COMMENT 'Estatus de como se encuentra el pedido',
  `CarritoID` INT NOT NULL,
  `Direccion` TINYINT NOT NULL COMMENT 'Domicilio del comprador',
  PRIMARY KEY (`OrdenID`),
  INDEX `FK_CarritoIDOrden_idx` (`CarritoID` ASC) VISIBLE,
  INDEX `FK_DireccionOrden_idx` (`Direccion` ASC) VISIBLE,
  CONSTRAINT `FK_CarritoIDOrden`
    FOREIGN KEY (`CarritoID`) REFERENCES `carrito` (`CarritoID`),
  CONSTRAINT `FK_DireccionOrden`
    FOREIGN KEY (`Direccion`) REFERENCES `domicilio` (`DomicilioID`)
    )
ENGINE = InnoDB
AUTO_INCREMENT = 1000;
