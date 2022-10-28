-- Active: 1663435269890@@127.0.0.1@3306@tiendabdm
DROP DATABASE tiendaBDM;
CREATE DATABASE IF NOT EXISTS tiendaBDM;
USE tiendaBDM;


CREATE TABLE Usuarios (
	Id_Usuario 					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Usuario', 
	Alias_Usuario 				varchar(30) NOT NULL UNIQUE COMMENT 'Username de usuario',
    Password_Usuario			varchar(30) NOT NULL COMMENT 'Clave de accesos de usuario',
    Rol_Usuario					tinyint NOT NULL COMMENT '1=CLIENTE, 2=VENDEDOR 3=CLIENTE/VENDEDOR, 4=ADMIN, 5=SUPER ADMIN', 
    Correo_Usuario              varchar(30) NOT NULL COMMENT 'Correo del usuario',
    Imagen_Usuario				mediumblob COMMENT 'Imagen de perfil del usuario',
    Nombre_Usuario				varchar(30) NOT NULL COMMENT 'Nombre de pila del usuario',
    ApePaterno_Usuario  		varchar(30) NOT NULL COMMENT 'Apellido paterno del usuario',
    ApeMaterno_Usuario  		varchar(30) NOT NULL COMMENT 'Apellido materno del usuario',
    FechaNacimiento_Usuario		date NOT NULL COMMENT 'Fecha de nacimiento del usuario',
    Genero_Usuario				tinyint NOT NULL COMMENT '1 = HOMBRE, 2 = MUJER',
    FechaIngreso_Usuario		date NOT NULL COMMENT 'Fecha de registro del usuario',
    Privacidad_Usuario			tinyint NOT NULL COMMENT '1 = PUBLICO, 2 = PRIVADO',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica de Usuario',
    PRIMARY KEY (Id_Usuario)
);


CREATE TABLE IF NOT EXISTS Categorias(
  Id_Categoria                 bigint AUTO_INCREMENT NOT NULL UNIQUE,
  Nombre_Categoria             varchar(30) NOT NULL UNIQUE,
  Descrip_Categoria            varchar(400) NOT NULL,
  UsuarioCreador_Categoria     bigint NOT NULL, #FK

  PRIMARY KEY(Id_Categoria)
);

#PRODUCTOS---------------------------------------------------------------------------------------------------

CREATE TABLE Productos (
	Id_Producto					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Producto',
    Usuario_Vendedor			bigint NOT NULL COMMENT 'Usuario que ofrece el producto', #FK
    Nombre_Producto				varchar(30) NOT NULL COMMENT 'Nombre del producto',
    Descrip_Producto			varchar(500) COMMENT 'Descripcion del producto',
    ModoVenta_Producto			tinyint NOT NULL COMMENT '1 = VENTA, 2 = COTIZACION',
    Precio_Producto				decimal(20, 2) COMMENT 'Precio del producto',
    Existencias_Producto		bigint NOT NULL COMMENT 'Cantidad del producto que se tiene',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica Producto',
    
    PRIMARY KEY (Id_Producto)
);

CREATE TABLE ImagenesProductos(
	Id_Imagen					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de la Imagen',
	Id_Producto 				bigint NOT NULL COMMENT 'Producto al que pertenece la imagen', #FK
    Imagen_Producto				mediumblob NOT NULL COMMENT 'La imagen del producto',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    PRIMARY KEY (Id_Imagen)
);

CREATE TABLE VideosProductos(
	Id_Video					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Video',
	Id_Producto					bigint NOT NULL COMMENT 'Producto al que pertence el video', #FK
    Video_Producto				mediumblob NOT NULL COMMENT 'El video del producto',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica', 
    
    PRIMARY KEY (Id_Video)
);

CREATE TABLE CategoriasEnProductos(
	Id_CategoriaEnProducto		bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Categoria en Producto',
    Id_Producto					bigint NOT NULL COMMENT 'Producto con dicha categoria', #FK
    Id_Categoria				bigint NOT NULL COMMENT 'Categoria del producto', #FK
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_CategoriaEnProducto)
);


#-----LLAVES FORANEAS----------------------------------------------------------------------------------------------------#


ALTER TABLE  Categorias add CONSTRAINT FK_CATEGORIA foreign key (UsuarioCreador_Categoria) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  Productos add CONSTRAINT FK_PRODUCTOS foreign key (Usuario_Vendedor) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  ImagenesProductos add CONSTRAINT FK_IMAGENESPRODUCTOS foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  VideosProductos add CONSTRAINT FK_VIDEOSPRODUCTOS foreign key (Id_Producto) REFERENCES Productos(Id_Producto);

ALTER TABLE  CategoriasEnProductos add CONSTRAINT FK_CATEGORIASENPRODUCTOS1 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  CategoriasEnProductos add CONSTRAINT FK_CATEGORIASENPRODUCTOS2 foreign key (Id_Categoria) REFERENCES Categorias(Id_Categoria);
