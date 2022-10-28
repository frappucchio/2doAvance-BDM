<?php

require_once "Backend/Utils/ConexionBD.php";
require_once "Backend/Models/Productos_Model.php";

class Productos_DAO{

    private static $procedureName = "Sp_Productos";

    public function __construct(){

    }

    public static function productos_ABC($option, Productos_Model $product) {

        //$option = "Insert";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, :p_Usuario_Vendedor, :p_Nombre_Producto, :p_Descrip_Producto, :p_ModoVenta_Producto,
        :p_Precio_Producto, :p_Existencias_Producto, null, null, null)");
        

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Id_Producto"=>$product->getId_Producto(),
                    ":p_Usuario_Vendedor"=>$product->getUsuario_Vendedor(),
                    ":p_Nombre_Producto"=>$product->getNombre_Producto(),
                    ":p_Descrip_Producto"=>$product->getDescrip_Producto(),
                    ":p_ModoVenta_Producto"=>$product->getModoVenta_Producto(),
                    ":p_Precio_Producto"=>$product->getPrecio_Producto(),
                    ":p_Existencias_Producto"=>$product->getExistencias_Producto()
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public static function agregarImagenProducto($Id_Producto, $imagen) {

        $option = "InsertImagenProducto";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, :p_Imagen_Producto, null, null)");
        

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Imagen_Producto"=>$imagen,
                    ":p_Id_Producto"=>$Id_Producto
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public static function agregarVideoProducto($Id_Producto, $video) {

        $option = "InsertVideoProducto";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, :p_Video_Producto, null)");
        

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Video_Producto"=>$video,
                    ":p_Id_Producto"=>$Id_Producto
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public static function agregarCategoriaProducto($Id_Producto, $categoria) {

        $option = "InsertCategoriaProducto";
        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, :p_Id_Categoria)");
        

        $result = true;
        try {
            $statement->execute(
                array(
                    ":p_Opc"=>$option,
                    ":p_Id_Categoria"=>$categoria,
                    ":p_Id_Producto"=>$Id_Producto
                )
            );
            
        } catch(Exception $e){
            
            $result =  false;
        } 


        return $result;
    }

    public static function GetAllProductos() {
        $option = "GetAllProductos";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        null, null, null, null, null, null, null, null, null, null)");

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

    public static function GetUltimoProductoAgregado(){
        $option = "GetUltimoProductoAgregado";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        null, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);

   
        $result = true;
        
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $Id_Producto = $result["UltimoProducto"];
            

        }catch (Exception $e){
         
        }
        return $Id_Producto;
    }

    public static function GetPrimeraImagenProducto($Id_Producto){
        $option = "GetPrimeraImagenProducto";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Producto", $Id_Producto, PDO::PARAM_INT);
   
        $result = true;
        
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $PrimeraImagenProducto = $result["Imagen_Producto"];
            

        }catch (Exception $e){
         
        }
        return $PrimeraImagenProducto;
    }

    public static function GetPrimeraCategoriaProducto($Id_Producto){
        $option = "GetPrimeraCategoriaProducto";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Producto", $Id_Producto, PDO::PARAM_INT);
   
        $result = true;
        
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $PrimeraCategoriaProducto = $result["Nombre_Categoria"];
            

        }catch (Exception $e){
         
        }
        return $PrimeraCategoriaProducto;
    }

    public static function GetProductoById($Id_Producto){
        $option = "GetProductoById";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Producto", $Id_Producto, PDO::PARAM_INT);

   
        $producto = null;
        try {
            $statement->execute();
            $result = $statement->fetch();
            
            $producto = new Productos_Model();
            $producto->setId_Producto($result["Id_Producto"]);
            $producto->setUsuario_Vendedor($result["Usuario_Vendedor"]);
            $producto->setNombre_Producto($result["Nombre_Producto"]);
            $producto->setDescrip_Producto($result["Descrip_Producto"]);
            $producto->setModoVenta_Producto($result["ModoVenta_Producto"]);
            $producto->setPrecio_Producto($result["Precio_Producto"]);
            $producto->setExistencias_Producto($result["Existencias_Producto"]);

        }catch (Exception $e){
         
        }
        return $producto;
    }

    public static function GetAllImagenesDeProducto($Id_Producto) {
        $option = "GetAllImagenesDeProducto";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Producto", $Id_Producto, PDO::PARAM_INT);

        $result = true;
        try {
            $statement->execute();
            $result = $statement->fetchAll();
        }catch(Exception $e){
            $result = false;
        }


        return $result;
    }

    public static function GetAllCategoriasDeProducto($Id_Producto) {
        $option = "GetAllCategoriasDeProducto";

        $statement = ConexionBD::Connect()->prepare("CALL ".self::$procedureName."(:p_Opc,
        :p_Id_Producto, null, null, null, null, null, null, null, null, null)");

        $statement->bindParam(":p_Opc", $option, PDO::PARAM_STR);
        $statement->bindParam(":p_Id_Producto", $Id_Producto, PDO::PARAM_INT);

        $result = true;
        try {
            $statement->execute();
            $result = $statement->fetchAll();
        }catch(Exception $e){
            $result = false;
        }


        return $result;
    }

}
