<?php

require_once "Backend/Utils/ConexionBD.php";

class Productos_Model {

    private $Id_Producto;
    private $Usuario_Vendedor;
    private $Nombre_Producto;
    private $Descrip_Producto;
    private $ModoVenta_Producto;
    private $Precio_Producto;
    private $Existencias_Producto;
    private $Imagen_Producto;
    private $Video_Producto;

    public static function createProducto($Id_Producto, $Usuario_Vendedor, $Nombre_Producto, $Descrip_Producto, 
                                        $ModoVenta_Producto, $Precio_Producto, $Existencias_Producto,
                                        $Imagen_Producto, $Video_Producto){

        $instance = new self();
        $instance->setId_Producto($Id_Producto);
        $instance->setUsuario_Vendedor($Usuario_Vendedor);
        $instance->setNombre_Producto($Nombre_Producto);
        $instance->setDescrip_Producto($Descrip_Producto);
        $instance->setModoVenta_Producto($ModoVenta_Producto);
        $instance->setPrecio_Producto($Precio_Producto);
        $instance->setExistencias_Producto($Existencias_Producto);
        $instance->setImagen_Producto($Imagen_Producto);
        $instance->setVideo_Producto($Video_Producto);
        
        return $instance;
    }

    //
    public function getId_Producto(){
        return $this->Id_Producto;
    }
    public function setId_Producto($Id_Producto){
        $this->Id_Producto = $Id_Producto;
    }

    //
    public function getUsuario_Vendedor(){
        return $this->Usuario_Vendedor;
    }
    public function setUsuario_Vendedor($Usuario_Vendedor){
        $this->Usuario_Vendedor = $Usuario_Vendedor;
    }

    //
    public function getNombre_Producto(){
        return $this->Nombre_Producto;
    }
    public function setNombre_Producto($Nombre_Producto){
        $this->Nombre_Producto = $Nombre_Producto;
    }

    //
    public function getDescrip_Producto(){
        return $this->Descrip_Producto;
    }
    public function setDescrip_Producto($Descrip_Producto){
        $this->Descrip_Producto = $Descrip_Producto;
    }

    //
    public function getModoVenta_Producto(){
        return $this->ModoVenta_Producto;
    }
    public function setModoVenta_Producto($ModoVenta_Producto){
        $this->ModoVenta_Producto = $ModoVenta_Producto;
    }

    //
    public function getPrecio_Producto(){
        return $this->Precio_Producto;
    }
    public function setPrecio_Producto($Precio_Producto){
        $this->Precio_Producto = $Precio_Producto;
    }

    //
    public function getExistencias_Producto(){
        return $this->Existencias_Producto;
    }
    public function setExistencias_Producto($Existencias_Producto){
        $this->Existencias_Producto = $Existencias_Producto;
    }

    //
    public function getImagen_Producto(){
        return $this->Imagen_Producto;
    }
    public function setImagen_Producto($Imagen_Producto){
        $this->Imagen_Producto = $Imagen_Producto;
    }

    //
    public function getVideo_Producto(){
        return $this->Video_Producto;
    }
    public function setVideo_Producto($Video_Producto){
        $this->Video_Producto = $Video_Producto;
    }

   
}
