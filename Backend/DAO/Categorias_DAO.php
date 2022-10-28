<?php

require_once "Backend/Utils/ConexionBD.php";
require_once "Backend/Models/Categorias_Model.php";

class Categorias_DAO{

    private static $procedureName = "Sp_Categorias";

    public function __construct(){

    }

    public static function categorias_ABC($option, Categorias_Model $category) {

        $option = "Insert";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc, 
        :p_Id_Categoria, :p_Nombre_Categoria, :p_Descrip_Categoria, :p_UsuarioCreador_Categoria)");
        

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Id_Categoria"=>$category->getId_Categoria(),
                    ":p_Nombre_Categoria"=>$category->getNombre_Categoria(),
                    ":p_Descrip_Categoria"=>$category->getDescrip_Categoria(),
                    ":p_UsuarioCreador_Categoria"=>$category->getUsuarioCreador_categoria()
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public static function GetAllCategorias() {
        $option = "GetAllCategorias";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);

        $result = true;
        try {
            $statement->execute();
            $result = $statement;
        }catch(Exception $e){
            $result = false;
        }


        return $result;
    }

}
