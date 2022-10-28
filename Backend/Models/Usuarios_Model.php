<?php

require_once "Backend/Utils/ConexionBD.php";

class Usuarios_Model {

    private $Id_Usuario;
	private $Alias_Usuario;
    private $Password_Usuario;
    private $Rol_Usuario;
    private $Correo_Usuario;
    private $Imagen_Usuario;
    private $Nombre_Usuario;
    private $ApePaterno_Usuario;
    private $ApeMaterno_Usuario;
    private $FechaNacimiento_Usuario;
    private $Genero_Usuario;
    private $FechaIngreso_Usuario;
    private $Privacidad_Usuario;

    public static function createUsuario($Id_Usuario, $Alias_Usuario, $Password_Usuario, $Rol_Usuario, $Correo_Usuario,
                                        $Imagen_Usuario, $Nombre_Usuario, $ApePaterno_Usuario, $ApeMaterno_Usuario,
                                        $FechaNacimiento_Usuario, $Genero_Usuario, $FechaIngreso_Usuario, $Privacidad_Usuario){

        $instance = new self();
        $instance->setId_Usuario($Id_Usuario);
        $instance->setAlias_Usuario($Alias_Usuario);
        $instance->setPassword_Usuario($Password_Usuario);
        $instance->setRol_Usuario($Rol_Usuario);
        $instance->setCorreo_Usuario($Correo_Usuario);
        $instance->setImagen_Usuario($Imagen_Usuario);
        $instance->setNombre_Usuario($Nombre_Usuario);
        $instance->setApePaterno_Usuario($ApePaterno_Usuario);
        $instance->setApeMaterno_Usuario($ApeMaterno_Usuario);
        $instance->setFechaNacimiento_Usuario($FechaNacimiento_Usuario);
        $instance->setGenero_Usuario($Genero_Usuario);
        $instance->setFechaIngreso_Usuario($FechaIngreso_Usuario);
        $instance->setPrivacidad_Usuario($Privacidad_Usuario);

        return $instance;
    }

    //
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario = $Id_Usuario;
    }

    //
    public function getAlias_Usuario(){
        return $this->Alias_Usuario;
    }
    public function setAlias_Usuario($Alias_Usuario){
        $this->Alias_Usuario = $Alias_Usuario;
    }

    //
    public function getPassword_Usuario(){
        return $this->Password_Usuario;
    }
    public function setPassword_Usuario($Password_Usuario){
        $this->Password_Usuario = $Password_Usuario;
    }

    //
    public function getRol_Usuario(){
        return $this->Rol_Usuario;
    }
    public function setRol_Usuario($Rol_Usuario){
        $this->Rol_Usuario = $Rol_Usuario;
    }

    //
    public function getCorreo_Usuario(){
        return $this->Correo_Usuario;
    }
    public function setCorreo_Usuario($Correo_Usuario){
        $this->Correo_Usuario = $Correo_Usuario;
    }

    //
    public function getImagen_Usuario(){
        return $this->Imagen_Usuario;
    }
    public function setImagen_Usuario($Imagen_Usuario){
        $this->Imagen_Usuario = $Imagen_Usuario;
    }

    //
    public function getNombre_Usuario(){
        return $this->Nombre_Usuario;
    }
    public function setNombre_Usuario($Nombre_Usuario){
        $this->Nombre_Usuario = $Nombre_Usuario;
    }

    //
    public function getApePaterno_Usuario(){
        return $this->ApePaterno_Usuario;
    }
    public function setApePaterno_Usuario($ApePaterno_Usuario){
        $this->ApePaterno_Usuario = $ApePaterno_Usuario;
    }

    //
    public function getApeMaterno_Usuario(){
        return $this->ApeMaterno_Usuario;
    }
    public function setApeMaterno_Usuario($ApeMaterno_Usuario){
        $this->ApeMaterno_Usuario = $ApeMaterno_Usuario;
    }

    //
    public function getFechaNacimiento_Usuario(){
        return $this->FechaNacimiento_Usuario;
    }
    public function setFechaNacimiento_Usuario($FechaNacimiento_Usuario){
        $this->FechaNacimiento_Usuario = $FechaNacimiento_Usuario;
    }

    //
    public function getGenero_Usuario(){
        return $this->Genero_Usuario;
    }
    public function setGenero_Usuario($Genero_Usuario){
        $this->Genero_Usuario = $Genero_Usuario;
    }

    //
    public function getFechaIngreso_Usuario(){
        return $this->FechaIngreso_Usuario;
    }
    public function setFechaIngreso_Usuario($FechaIngreso_Usuario){
        $this->FechaIngreso_Usuario = $FechaIngreso_Usuario;
    }
    
    //
    public function getPrivacidad_Usuario(){
        return $this->Privacidad_Usuario;
    }
    public function setPrivacidad_Usuario($Privacidad_Usuario){
        $this->Privacidad_Usuario = $Privacidad_Usuario;
    }

    /*// Example 2
    public function InsertUserV2() {
        $option = "Insert";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:opcion,null,:nombre,:apellido,:email)");

        $statement->execute(array(  
            ":opcion" => $option,
            ":nombre" => $this->name,
            ":apellido" => $this->lastname,
            ":email" => $this->email
        ));

        $result = true;
        try {
            $statement->execute();
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }*/

   
}
