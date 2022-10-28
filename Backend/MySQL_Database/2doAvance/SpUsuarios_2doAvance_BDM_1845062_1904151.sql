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