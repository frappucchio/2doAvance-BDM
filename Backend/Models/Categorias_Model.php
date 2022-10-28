<?php
require_once "Backend/Utils/ConexionBD.php";

class Categorias_Model
{

    private $Id_Categoria;
    private $Nombre_Categoria;
    private $Descrip_Categoria;
    private $UsuarioCreador_Categoria;

    public static function createCategoria($Id_Categoria, $Nombre_Categoria, $Descrip_Categoria, $UsuarioCreador_Categoria)
    {

        $instance = new self();
        $instance->setId_Categoria($Id_Categoria);
        $instance->setNombre_Categoria($Nombre_Categoria);
        $instance->setDescrip_Categoria($Descrip_Categoria);
        $instance->setUsuarioCreador_categoria($UsuarioCreador_Categoria);

        return $instance;
    }

    //
    public function getId_Categoria()
    {
        return $this->Id_Categoria;
    }
    public function setId_Categoria($Id_Categoria)
    {
        $this->Id_Categoria = $Id_Categoria;
    }

    //
    public function getNombre_Categoria()
    {
        return $this->Nombre_Categoria;
    }
    public function setNombre_Categoria($Nombre_Categoria)
    {
        $this->Nombre_Categoria = $Nombre_Categoria;
    }

    //
    public function getDescrip_Categoria()
    {
        return $this->Descrip_Categoria;
    }
    public function setDescrip_Categoria($Descrip_Categoria)
    {
        $this->Descrip_Categoria = $Descrip_Categoria;
    }

    //
    public function getUsuarioCreador_categoria()
    {
        return $this->UsuarioCreador_Categoria;
    }
    public function setUsuarioCreador_categoria($UsuarioCreador_Categoria)
    {
        $this->UsuarioCreador_Categoria = $UsuarioCreador_Categoria;
    }
}
