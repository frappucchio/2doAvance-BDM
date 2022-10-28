USE tiendaBDM;


#DROP procedure Sp_Usuarios;
DELIMITER $$
CREATE PROCEDURE Sp_Usuarios(
	IN p_Opc						varchar(30),
    IN p_Id_Usuario 				bigint, 
	IN p_Alias_Usuario 			 	varchar(30),
    IN p_Password_Usuario			varchar(30),
    IN p_Rol_Usuario				int,
    IN p_Correo_Usuario             varchar(30),
    IN p_Imagen_Usuario				mediumblob,
    IN p_Nombre_Usuario				varchar(30),
    IN p_ApePaterno_Usuario  		varchar(30),
    IN p_ApeMaterno_Usuario  		varchar(30),
    IN p_FechaNacimiento_Usuario	date,
    IN p_Genero_Usuario				int,
    IN p_FechaIngreso_Usuario		date,
    IN p_Privacidad_Usuario			tinyint)
BEGIN

	IF p_Opc = 'Insert'
	THEN 
		INSERT INTO Usuarios(Alias_Usuario, Password_Usuario, Rol_Usuario, Correo_Usuario, Imagen_Usuario, Nombre_Usuario,
							 ApePaterno_Usuario, ApeMaterno_Usuario, FechaNacimiento_Usuario, Genero_Usuario, 
							 FechaIngreso_Usuario, Privacidad_Usuario, Activo)
					  VALUES(p_Alias_Usuario, p_Password_Usuario, p_Rol_Usuario, p_Correo_Usuario, p_Imagen_Usuario, p_Nombre_Usuario,
							 p_ApePaterno_Usuario, p_ApeMaterno_Usuario, p_FechaNacimiento_Usuario, p_Genero_Usuario, 
							 CURRENT_DATE(), 1, 1);
	END IF;
    
    IF p_Opc = 'EditUserById'
	THEN 
		UPDATE Usuarios
		SET Usuarios.Alias_Usuario = p_Alias_Usuario, 
			Usuarios.Password_Usuario = p_Password_Usuario,  
			Usuarios.Correo_Usuario = p_Correo_Usuario, 
			Usuarios.Imagen_Usuario = p_Imagen_Usuario, 
			Usuarios.Nombre_Usuario = p_Nombre_Usuario,
			Usuarios.ApePaterno_Usuario = p_ApePaterno_Usuario, 
			Usuarios.ApeMaterno_Usuario = p_ApeMaterno_Usuario, 
			Usuarios.FechaNacimiento_Usuario = p_FechaNacimiento_Usuario, 
			Usuarios.Genero_Usuario = p_Genero_Usuario, 
			Usuarios.Privacidad_Usuario = p_Privacidad_Usuario
		WHERE Usuarios.Id_Usuario = p_Id_Usuario;
	END IF;
    
	IF p_Opc = 'DeleteUserById'
	THEN 
		UPDATE Usuarios
		SET Usuarios.Activo = 0
		WHERE Usuarios.Id_Usuario = p_Id_Usuario;
	END IF;
    
    IF p_Opc = 'GetUserById'
	THEN 
		SELECT Id_Usuario, Alias_Usuario, Password_Usuario, Rol_Usuario, Correo_Usuario, Imagen_Usuario, 
			   Nombre_Usuario, ApePaterno_Usuario, ApeMaterno_Usuario, FechaNacimiento_Usuario, Genero_Usuario,
			   FechaIngreso_Usuario, Privacidad_Usuario
		FROM Usuarios
        WHERE Usuarios.Id_Usuario = p_Id_Usuario;
	END IF;
    
    IF p_Opc = 'GetUserByAlias_Usuario'
	THEN 
		SELECT Id_Usuario, Alias_Usuario, Password_Usuario, Rol_Usuario, Correo_Usuario, Imagen_Usuario, 
			   Nombre_Usuario, ApePaterno_Usuario, ApeMaterno_Usuario, FechaNacimiento_Usuario, Genero_Usuario,
			   FechaIngreso_Usuario, Privacidad_Usuario
		FROM Usuarios
        WHERE Usuarios.Alias_Usuario = p_Alias_Usuario;
	END IF;
    
    IF p_Opc = 'GetAllUsers'
	THEN 
		SELECT Id_Usuario, Alias_Usuario, Correo_Usuario
		FROM Usuarios;
	END IF;
    
    IF p_Opc = 'Login_Usuario'
	THEN 
		SELECT Id_Usuario, Alias_Usuario, Password_Usuario, Rol_Usuario, Correo_Usuario, Imagen_Usuario, 
			   Nombre_Usuario, ApePaterno_Usuario, ApeMaterno_Usuario, FechaNacimiento_Usuario, Genero_Usuario,
			   FechaIngreso_Usuario, Privacidad_Usuario
		FROM Usuarios
        WHERE Usuarios.Alias_Usuario = p_Alias_Usuario
        AND   Usuarios.Password_Usuario = p_Password_Usuario
        AND   Usuarios.Activo = 1;
	END IF;
   
    
END$$

DELIMITER ;

#----------CATEGORIAS----------------------------------------------------------------------------------------------#

#DROP procedure Sp_Categorias;
DELIMITER $$
CREATE PROCEDURE Sp_Categorias(
	IN p_Opc						varchar(30),
    IN p_Id_Categoria				bigint, 
	IN p_Nombre_Categoria 			varchar(30),
	IN p_Descrip_Categoria 			varchar(30),
    IN p_UsuarioCreador_Categoria	bigint)
BEGIN

	IF p_Opc = 'Insert'
	THEN 
		INSERT INTO Categorias(Nombre_Categoria, Descrip_Categoria, UsuarioCreador_Categoria)
					  VALUES(p_Nombre_Categoria, p_Descrip_Categoria, p_UsuarioCreador_Categoria);
	END IF;
    
    IF p_Opc = 'GetAllCategorias'
	THEN 
		SELECT Id_Categoria, Nombre_Categoria, Descrip_Categoria , UsuarioCreador_Categoria
		FROM Categorias;
	END IF;
    
END$$

DELIMITER ;

#----------PRODUCTOS----------------------------------------------------------------------------------------------#

#DROP PROCEDURE Sp_Productos;
DELIMITER $$
CREATE PROCEDURE Sp_Productos(
	IN p_Opc						varchar(30),
    IN p_Id_Producto				bigint,
    IN p_Usuario_Vendedor			bigint, #FK
    IN p_Nombre_Producto			varchar(30),
    IN p_Descrip_Producto			varchar(500),
    IN p_ModoVenta_Producto			tinyint,
    IN p_Precio_Producto			decimal(20, 2),
    IN p_Existencias_Producto		bigint,
    IN p_Imagen_Producto			mediumblob,
    IN p_Video_Producto				mediumblob,
    IN p_Id_Categoria				bigint,
    IN p_Id_Vendedor				bigint)
BEGIN

	
    IF p_Opc = 'Insert'
	THEN 
		INSERT INTO Productos(Usuario_Vendedor, Nombre_Producto, Descrip_Producto, ModoVenta_Producto, Precio_Producto,
							  Existencias_Producto)
					  VALUES(p_Usuario_Vendedor, p_Nombre_Producto, p_Descrip_Producto, p_ModoVenta_Producto, p_Precio_Producto,
							  p_Existencias_Producto);
		
	END IF;
    
    IF p_Opc = 'InsertImagenProducto'
	THEN 
		INSERT INTO ImagenesProductos(Id_Producto, Imagen_Producto)
							   VALUES(p_Id_Producto, p_Imagen_Producto);
	END IF;
    
    IF p_Opc = 'InsertVideoProducto'
	THEN 
		INSERT INTO VideosProductos(Id_Producto, Video_Producto)
							 VALUES(p_Id_Producto, p_Video_Producto);
	END IF;
    
     IF p_Opc = 'InsertCategoriaProducto'
	THEN 
    
		INSERT INTO CategoriasEnProductos(Id_Producto, Id_Categoria)
								   VALUES(p_Id_Producto, p_Id_Categoria);
	END IF;
    
    IF p_Opc = 'GetAllProductos'
	THEN 
		SELECT Id_Producto, Usuario_Vendedor, Nombre_Producto, Descrip_Producto, ModoVenta_Producto, Precio_Producto,
			   Existencias_Producto
		FROM Productos
        WHERE Productos.Activo = 1;
	END IF;
    
    IF p_Opc = 'GetUltimoProductoAgregado'
	THEN 
		SELECT MAX(Id_Producto)  AS UltimoProducto 
        FROM Productos
        WHERE Productos.Activo = 1;
	END IF;
    
    IF p_Opc = 'GetPrimeraImagenProducto'
	THEN 
		SELECT Imagen_Producto
		FROM ImagenesProductos
        WHERE ImagenesProductos.Activo = 1
        AND ImagenesProductos.Id_Producto = p_Id_Producto
        LIMIT 1;
	END IF;
    
    IF p_Opc = 'GetPrimeraCategoriaProducto'
	THEN 
		SELECT B.Nombre_Categoria
		FROM Categorias AS B
		CROSS JOIN 
        (SELECT Id_Categoria
			FROM CategoriasEnProductos
			WHERE CategoriasEnProductos.Activo = 1
			AND CategoriasEnProductos.Id_Producto = p_Id_Producto
			LIMIT 1) as A
		ON B.Id_Categoria = A.Id_Categoria;
	END IF;
    
	IF p_Opc = 'GetProductoById'
	THEN 
		SELECT Id_Producto, Usuario_Vendedor, Nombre_Producto, Descrip_Producto, ModoVenta_Producto, Precio_Producto,
			   Existencias_Producto
		FROM Productos
        WHERE Productos.Id_Producto = p_Id_Producto
        AND Productos.Activo = 1;
	END IF;
    
    IF p_Opc = 'GetAliasVendedorById'
	THEN 
		SELECT Alias_Usuario
		FROM Usuarios
        WHERE Usuarios.Id_Usuario = p_Id_Vendedor;
	END IF;
    
END$$

DELIMITER ;




