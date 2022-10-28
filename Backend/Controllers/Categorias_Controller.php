<?php

require_once "Backend/Controllers/template.controller.php";
require_once "Backend/Models/Categorias_Model.php";
require_once "Backend/DAO/Categorias_DAO.php";
require_once "Backend/Utils/action.php";

class Categorias_Controller extends Controller
{

    //CONTROLLER ROUTE
    public const ROUTE = "categorias";

    //ACTIONS ROUTING
    public const REGISTRAR_CATEGORIA = "registrarcategoria";
    public const EDITAR_CATEGORIA = "editarcategoria";
     public const  SHOW_ALL_CATEGORIES = "mostrarcategoria";


    public $actions;

    public function __construct()
    {
        //parent::__construct($pathName);

        $this->actions = array(
            self::REGISTRAR_CATEGORIA =>      new Action("mostrarPaginaRegistro", "crearCategoria"),
            self::EDITAR_CATEGORIA =>         new Action(null, null),
            self::SHOW_ALL_CATEGORIES =>      new Action("showallcategories",null),
            
        );
    }

    public function ShowContent($paths)
    {
        //Determine wich method call TO A SPECIFIC ACTION SENDED IT IN THE URL
        Action::ValidateActionsPath($paths, $this);
    }

    public function mostrarPaginaRegistro($paths)
    {
        if(isset($args["result"])){
            $args = $_POST['args'];
        }
        $test = 20;
        include "View/Pages/agregar_Categoria.php";
    }

    public function crearCategoria($path)
    {

        // $category = Categorias_Model::createCategoria(
        //     null,
        //    htmlspecialchars($_POST["nombreCategoria_input_name"]),
        //    htmlspecialchars($_POST["descripCategoria_textarea_name"]),
        //    null 
        // );

        // //$result = $user->InsertUser($user);

        // $result = Categorias_DAO::categorias_ABC("Insert", $category);


        // $args = array("result" => $result);



        // if ($result == true) {
        //     echo '<script language="javascript">alert("Se ha agregado exitosamente");</script>';
            
        // } else {
        //     ob_end_clean();
        //     echo '<script language="javascript">alert("No se pudo registrar la categoria");</script>';
        //     die();
        // }

       //header("location: ../Categorias_API.php");

    }

    public function ShowAllCategorias($path)
    {

        $allCategorias = Categorias_DAO::GetAllCategorias();

        return $allCategorias;

    }

    


}
