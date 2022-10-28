<?php

require_once "Backend/Utils/ConexionBD.php";
require_once "Backend/Models/Usuarios_Model.php";

class Usuarios_DAO{

    private static $procedureName = "Sp_Usuarios";

    public function __construct(){

    }

    public static function usuarios_ABC($option, Usuarios_Model $user) {

        //$option = "Insert";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc, 
        :p_Id_Usuario, :p_Alias_Usuario, :p_Password_Usuario, :p_Rol_Usuario, :p_Correo_Usuario,
        :p_Imagen_Usuario, :p_Nombre_Usuario, :p_ApePaterno_Usuario, :p_ApeMaterno_Usuario,
        :p_FechaNacimiento_Usuario, :p_Genero_Usuario, :p_FechaIngreso_Usuario, :p_Privacidad_Usuario)");
        
        /*$statement->bindParam(":opcion", $option, PDO::PARAM_STR);
        $statement->bindParam(":nombre", $user->getName(), PDO::PARAM_STR);
        $statement->bindParam(":apellido", $user->getLastName(), PDO::PARAM_STR);
        $statement->bindParam(":email", $user->getEmail(), PDO::PARAM_STR);*/

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Id_Usuario"=>$user->getId_Usuario(),
                    ":p_Alias_Usuario"=>$user->getAlias_Usuario(),
                    ":p_Password_Usuario"=>$user->getPassword_Usuario(),
                    ":p_Rol_Usuario"=>$user->getRol_Usuario(),
                    ":p_Correo_Usuario"=>$user->getCorreo_Usuario(),
                    ":p_Imagen_Usuario"=>$user->getImagen_Usuario(),
                    ":p_Nombre_Usuario"=>$user->getNombre_Usuario(),
                    ":p_ApePaterno_Usuario"=>$user->getApePaterno_Usuario(),
                    ":p_ApeMaterno_Usuario"=>$user->getApeMaterno_Usuario(),
                    ":p_FechaNacimiento_Usuario"=>$user->getFechaNacimiento_Usuario(),
                    ":p_Genero_Usuario"=>$user->getGenero_Usuario(),
                    ":p_FechaIngreso_Usuario"=>$user->getFechaIngreso_Usuario(),
                    ":p_Privacidad_Usuario"=>$user->getPrivacidad_Usuario()
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }


    public static function GetUserById($id){
        $option = "GetUserById";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Usuario, null, null, null, null, null, null, null, null, null, null, null, null)");

        $idToInt = intval($id);

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Usuario", $idToInt, PDO::PARAM_INT);

   
        $user = null;
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $user = new Usuarios_Model();
            $user->setId_Usuario($result["Id_Usuario"]);
            $user->setAlias_Usuario($result["Alias_Usuario"]);
            $user->setPassword_Usuario($result["Password_Usuario"]);
            $user->setRol_Usuario($result["Rol_Usuario"]);
            $user->setCorreo_Usuario($result["Correo_Usuario"]);
            $user->setImagen_Usuario($result["Imagen_Usuario"]);
            $user->setNombre_Usuario($result["Nombre_Usuario"]);
            $user->setApePaterno_Usuario($result["ApePaterno_Usuario"]);
            $user->setApeMaterno_Usuario($result["ApeMaterno_Usuario"]);
            $user->setFechaNacimiento_Usuario($result["FechaNacimiento_Usuario"]);
            $user->setGenero_Usuario($result["Genero_Usuario"]);
            $user->setFechaIngreso_Usuario($result["FechaIngreso_Usuario"]);
            $user->setPrivacidad_Usuario($result["Privacidad_Usuario"]);

        }catch (Exception $e){
         
        }
        return $user;
    }

    public static function GetUserByAlias_Usuario($p_Alias_Usuario){
        $option = "GetUserByAlias_Usuario";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc, 
        null, :p_Alias_Usuario, null, null, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Alias_Usuario", $p_Alias_Usuario, PDO::PARAM_STR);

   
        $result = true;
        $user = new Usuarios_Model();
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            
            $user->setId_Usuario($result["Id_Usuario"]);
            $user->setAlias_Usuario($result["Alias_Usuario"]);
            $user->setPassword_Usuario($result["Password_Usuario"]);
            $user->setRol_Usuario($result["Rol_Usuario"]);
            $user->setCorreo_Usuario($result["Correo_Usuario"]);
            $user->setImagen_Usuario($result["Imagen_Usuario"]);
            $user->setNombre_Usuario($result["Nombre_Usuario"]);
            $user->setApePaterno_Usuario($result["ApePaterno_Usuario"]);
            $user->setApeMaterno_Usuario($result["ApeMaterno_Usuario"]);
            $user->setFechaNacimiento_Usuario($result["FechaNacimiento_Usuario"]);
            $user->setGenero_Usuario($result["Genero_Usuario"]);
            $user->setFechaIngreso_Usuario($result["FechaIngreso_Usuario"]);
            $user->setPrivacidad_Usuario($result["Privacidad_Usuario"]);

        }catch (Exception $e){
         
        }
        return $user;
    }

    public static function GetAllUsers() {
        $option = "GetAllUsers";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        null, null, null, null, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);

        $result = true;
        try {
            $statement->execute();
            $result = $statement->fetchAll();
        }catch(Exception $e){
            $result = false;
        }


        return $result;
    }

    public static function GetImagenUsuarioById($Id_Usuario){
        $option = "GetImagenUsuarioById";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Usuario, null, null, null, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Usuario", $Id_Usuario, PDO::PARAM_INT);

   
        $result = true;
        
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $ImagenPerfilUsuario = $result["Imagen_Usuario"];
            

        }catch (Exception $e){
         
        }
        return $ImagenPerfilUsuario;
    }

    public static function GetAliasUsuarioById($Id_Usuario){
        $option = "GetAliasUsuarioById";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Usuario, null, null, null, null, null, null, null, null, null, null, null, null)");


        
        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Usuario", $Id_Usuario, PDO::PARAM_INT);

   
        
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $Alias_Usuario = $result["Alias_Usuario"];

        }catch (Exception $e){
         
        }
        return $Alias_Usuario;
    }

    public static function Login_Usuario($p_Alias_Usuario, $p_Password_Usuario) {
        $option = "Login_Usuario";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        null, :p_Alias_Usuario, :p_Password_Usuario, null, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Alias_Usuario", $p_Alias_Usuario, PDO::PARAM_STR);
        $statement->bindParam(":p_Password_Usuario", $p_Password_Usuario, PDO::PARAM_STR);

        $result = true;
        $usuarioLogeado = new Usuarios_Model();
        try {
            $statement->execute();
            $result = $statement->fetch();

            
            $usuarioLogeado->setId_Usuario($result["Id_Usuario"]);
            $usuarioLogeado->setAlias_Usuario($result["Alias_Usuario"]);
            $usuarioLogeado->setPassword_Usuario($result["Password_Usuario"]);
            $usuarioLogeado->setRol_Usuario($result["Rol_Usuario"]);
            $usuarioLogeado->setCorreo_Usuario($result["Correo_Usuario"]);
            $usuarioLogeado->setImagen_Usuario($result["Imagen_Usuario"]);
            $usuarioLogeado->setNombre_Usuario($result["Nombre_Usuario"]);
            $usuarioLogeado->setApePaterno_Usuario($result["ApePaterno_Usuario"]);
            $usuarioLogeado->setApeMaterno_Usuario($result["ApeMaterno_Usuario"]);
            $usuarioLogeado->setFechaNacimiento_Usuario($result["FechaNacimiento_Usuario"]);
            $usuarioLogeado->setGenero_Usuario($result["Genero_Usuario"]);
            $usuarioLogeado->setFechaIngreso_Usuario($result["FechaIngreso_Usuario"]);
            $usuarioLogeado->setPrivacidad_Usuario($result["Privacidad_Usuario"]);
    

        }catch(Exception $e){
            
        }


        return $usuarioLogeado;
    }


}