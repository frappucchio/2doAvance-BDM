#---VER SP QUE HAY EN LA DATABASE
SELECT  routine_schema,  
        routine_name,  
        routine_type 
FROM information_schema.routines 
WHERE routine_schema = 'tiendaBDM' 
ORDER BY routine_name; 
#-----------------------------------------------------------------------------------------

CREATE DATABASE tiendaBDM;
DROP DATABASE tiendaBDM;
SHOW DATABASES;


INSERT INTO Usuarios(Alias_Usuario, Password_Usuario, Rol_Usuario, Correo_Usuario, Imagen_Usuario, Nombre_Usuario,
					 ApePaterno_Usuario, ApeMaterno_Usuario, FechaNacimiento_Usuario, Genero_Usuario, 
					 FechaIngreso_Usuario, Privacidad_Usuario)
			  VALUES("ana23", "asd32", "2", "rocio@hotmail.com", null, "Rocio", "Torres", "Bernal", '2008-7-04',
						1, CURDATE(), 1);

#-------------------------------------------------------------------------------------
USE tiendaBDM;
SELECT * FROM Usuarios;
SELECT * FROM Categorias;
SELECT * FROM Productos;
SELECT * FROM VideosProductos;
SELECT * FROM ImagenesProductos;
SELECT * FROM CategoriasEnProductos;

DELETE FROM Usuarios;
SHOW TABLES;
DROP TABLE usuarios;
DROP TABLE Categorias;
CALL Sp_Usuarios('Insert', null, 'pompo', 'aaa', 1, 'aa@hotmail.com',
        null, 'chio', 'chio2', 'chio3',
        '2008-7-04', 2, 1);
        
SHOW COLUMNS FROM Usuarios FROM tiendaBDM;

show databases;

SELECT LAST_INSERT_ID();
SELECT LAST_INSERT_ID() as Id_Producto FROM Productos;

SELECT MAX(Id_Producto) FROM Productos;