DROP DATABASE tiendaArteDB;
CREATE DATABASE tiendaArteDB;
USE tiendaArteDB;

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

CREATE TABLE Categorias (
	Id_Categoria 				bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Categoria',
    Nombre_Categoria			varchar(30) NOT NULL UNIQUE COMMENT 'Nombre de la Categoria',
    Descrip_Categoria			varchar(500) COMMENT 'Descripcion sobre la Categoria',
    UsuarioCreador_Categoria	bigint NOT NULL COMMENT 'Usuario que creó la categoria', #FK
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica de Categoria',
    
    PRIMARY KEY (Id_Categoria)
);

CREATE TABLE Productos (
	Id_Producto					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Producto',
    Usuario_Vendedor			bigint NOT NULL COMMENT 'Usuario que ofrece el producto', #FK
    Nombre_Producto				varchar(30) NOT NULL COMMENT 'Nombre del producto',
    Descrip_Producto			varchar(500) COMMENT 'Descripcion del producto',
    TipoVenta_Producto			tinyint NOT NULL COMMENT '1 = VENTA, 2 = COTIZACION',
    Precio_Producto				decimal(20, 2) COMMENT 'Precio del producto',
    Existencias_Producto		bigint NOT NULL COMMENT 'Cantidad del producto que se tiene',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica Producto',
    
    PRIMARY KEY (Id_Producto)
);

CREATE TABLE ValoracionesProductos (
	Id_ValoracionProducto		bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Valoracion de Producto',
    Id_Producto 				bigint NOT NULL COMMENT 'Producto valorado', #FK
    Id_Usuario 					bigint NOT NULL COMMENT 'Usuario que valoró', #FK
    Valoracion_Usuario 			int NOT NULL COMMENT 'Valoracion hecha',
	Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_ValoracionProducto)
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

CREATE TABLE Comentarios(
	Id_Comentario				bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Comentario',
    UsuarioCreador_Comentario	bigint NOT NULL COMMENT 'Usuario que creó el comentario', #FK
    ProductoComentado			bigint NOT NULL COMMENT 'Producto que fue comentado', #FK
    Descrip_Comentario			varchar(800) NOT NULL COMMENT 'Contenido del comentario',
    Fecha_Comentario			date COMMENT 'Fecha en que se realizó el comentario',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
	PRIMARY KEY (Id_Comentario)
);

CREATE TABLE Listas(
	Id_Lista					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Producto',
    UsuarioCreador_Lista		bigint NOT NULL COMMENT 'Usuario que creo la lista', #FK
    Nombre_Lista				varchar(30) NOT NULL COMMENT 'Nombre de la lista',
    Descrip_Lista				varchar(300) COMMENT 'Descripcion de la lista',
    Imagen_Lista				mediumblob COMMENT 'Imagen de la lista',
    Privacidad_Lista			tinyint NOT NULL COMMENT '1 = PUBLICO, 2 = PRIVADO',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_Lista)
);

CREATE TABLE ProductosEnListas(
	Id_ProductoEnLista			bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Producto en Lista',
    Id_Lista					bigint NOT NULL COMMENT 'Lista a la que esta el producto', #FK
    Id_Producto					bigint NOT NULL COMMENT 'Uno de muchos Productos que contiene la lista', #FK
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
	PRIMARY KEY (Id_ProductoEnLista)
);

CREATE TABLE CarritoCompras(
	Id_CarritoDeCompras			bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de Carrito',
    Id_Usuario					bigint NOT NULL COMMENT 'Usuario dueño del carrito', #FK
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_CarritoDeCompras)
);

CREATE TABLE ProductosEnCarritoCompras(
	Id_ProductoEnCarrito		bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Producto en el Carrito',
    Id_CarritoDeCompras			bigint NOT NULL COMMENT 'Carrito que contiene tal producto', #FK
    Id_Producto					bigint NOT NULL COMMENT 'Producto que esta en dicho carrito', #FK
    Cantidad_Producto			bigint NOT NULL COMMENT 'Cantidad de producto que hay en el carrito', 
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
	PRIMARY KEY (Id_ProductoEnCarrito)
);

CREATE TABLE Ventas(
	Id_Venta					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de la Venta',
    Usuario_Comprador			bigint NOT NULL COMMENT 'Usuario que compra', #FK
    FechaHora_Venta				datetime COMMENT 'Fecha y Hora de la Venta',
    Id_MetodoPago               bigint NOT NULL COMMENT 'Metodo de pago que se utilizó', #FK
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_Venta)
);

CREATE TABLE DetalleVentas(
	Id_DetalleVenta				bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Detalle de Venta',
    Id_Venta 					bigint NOT NULL COMMENT 'Detalle de dicha venta', #FK
    Id_Producto					bigint NOT NULL COMMENT 'Producto que se compró', #FK
    Cantidad_Producto	 		bigint NOT NULL COMMENT 'Cantidad del producto que se compro',	
    Importe_Venta				decimal(20,2) NOT NULL  COMMENT 'Monto que se pagó en la venta',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_DetalleVenta)
);

CREATE TABLE MetodoPago(
	Id_MetodoPago					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Metodo de Pago',
    Nombre_MetodoPago				varchar(30) NOT NULL COMMENT 'Nombre del Metodo de Pago',
    Imagen_MetodoPago				mediumblob COMMENT 'Imagen del Metodo de Pago',
    UsuarioCreador_MetodoPago		bigint NOT NULL COMMENT 'Usuario que creó el Metodo de Pago', #FK
    Activo							tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_MetodoPago)
);

CREATE TABLE SolicitudesCotizacion(
	Id_SolicitudCotizacion		bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador de la Solicitud de Cotizacion',
    Id_Producto			        bigint NOT NULL COMMENT 'Producto del que se solicitó cotización', #FK
    Id_Comprador				bigint NOT NULL COMMENT 'Usuario que solicitó la cotizacion', #FK
    Id_Vendedor				    bigint NOT NULL COMMENT 'Vendedor que ofrece el producto cotizado', #FK
    Precio_Negociado            decimal(20, 2) COMMENT 'Precio final negociado',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Solicitud activa o desactivada',
    
    PRIMARY KEY (Id_SolicitudCotizacion)
);

CREATE TABLE Mensajes(
	Id_Mensaje					bigint AUTO_INCREMENT NOT NULL UNIQUE COMMENT 'Identificador del Mensaje',
    Usuario_Emisor				bigint NOT NULL COMMENT 'Usuario que envio el mensaje', #FK
    Usuario_Receptor			bigint NOT NULL COMMENT 'Usuario que recibio el mensaje', #FK
    Descrip_Mensaje				varchar(800) NOT NULL COMMENT 'Contenido del mensaje', 
    Fecha_Mensaje				date COMMENT 'Fecha en la que se envio el mensaje',
    Activo						tinyint UNSIGNED DEFAULT 1 COMMENT 'Baja logica',
    
    PRIMARY KEY (Id_Mensaje)
);



ALTER TABLE  Categorias add CONSTRAINT FK_CATEGORIA foreign key (UsuarioCreador_Categoria) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  Productos add CONSTRAINT FK_PRODUCTOS foreign key (Usuario_Vendedor) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  ValoracionesProductos add CONSTRAINT FK_VALORACIONESPRODUCTOS1 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  ValoracionesProductos add CONSTRAINT FK_VALORACIONESPRODUCTOS2 foreign key (Id_Usuario) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  ImagenesProductos add CONSTRAINT FK_IMAGENESPRODUCTOS foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  VideosProductos add CONSTRAINT FK_VIDEOSPRODUCTOS foreign key (Id_Producto) REFERENCES Productos(Id_Producto);

ALTER TABLE  CategoriasEnProductos add CONSTRAINT FK_CATEGORIASENPRODUCTOS1 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  CategoriasEnProductos add CONSTRAINT FK_CATEGORIASENPRODUCTOS2 foreign key (Id_Categoria) REFERENCES Categorias(Id_Categoria);

ALTER TABLE  Comentarios add CONSTRAINT FK_COMENTARIOS1 foreign key (UsuarioCreador_Comentario) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  Comentarios add CONSTRAINT FK_COMENTARIOS2 foreign key (ProductoComentado) REFERENCES Productos(Id_Producto);

ALTER TABLE  Listas add CONSTRAINT FK_LISTAS foreign key (UsuarioCreador_Lista) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  ProductosEnListas add CONSTRAINT FK_PRODUCTOSENLISTAS1 foreign key (Id_Lista) REFERENCES Listas(Id_Lista);
ALTER TABLE  ProductosEnListas add CONSTRAINT FK_PRODUCTOSENLISTAS2 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);

ALTER TABLE  CarritoCompras add CONSTRAINT FK_CARRITOCOMPRAS foreign key (Id_Usuario) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  ProductosEnCarritoCompras add CONSTRAINT FK_PRODUCTOSENCARRITOCOMPRAS1 foreign key (Id_CarritoDeCompras) REFERENCES CarritoCompras(Id_CarritoDeCompras);
ALTER TABLE  ProductosEnCarritoCompras add CONSTRAINT FK_PRODUCTOSENCARRITOCOMPRAS2 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);

ALTER TABLE  Ventas add CONSTRAINT FK_VENTAS1 foreign key (Usuario_Comprador) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  Ventas add CONSTRAINT FK_VENTAS2 foreign key (Id_MetodoPago) REFERENCES MetodoPago(Id_MetodoPago);

ALTER TABLE  DetalleVentas add CONSTRAINT FK_DETALLEVENTAS1 foreign key (Id_Venta) REFERENCES Ventas(Id_Venta);
ALTER TABLE  DetalleVentas add CONSTRAINT FK_DETALLEVENTAS2 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);

ALTER TABLE  MetodoPago add CONSTRAINT FK_METODOPAGO foreign key (UsuarioCreador_MetodoPago) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  SolicitudesCotizacion add CONSTRAINT FK_SOLICITUDESCOTIZACION1 foreign key (Id_Producto) REFERENCES Productos(Id_Producto);
ALTER TABLE  SolicitudesCotizacion add CONSTRAINT FK_SOLICITUDESCOTIZACION2 foreign key (Id_Comprador) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  SolicitudesCotizacion add CONSTRAINT FK_SOLICITUDESCOTIZACION3 foreign key (Id_Vendedor) REFERENCES Usuarios(Id_Usuario);

ALTER TABLE  Mensajes add CONSTRAINT FK_MENSAJES1 foreign key (Usuario_Emisor) REFERENCES Usuarios(Id_Usuario);
ALTER TABLE  Mensajes add CONSTRAINT FK_MENSAJES2 foreign key (Usuario_Receptor) REFERENCES Usuarios(Id_Usuario);




