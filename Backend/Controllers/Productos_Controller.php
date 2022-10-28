<?php

require_once "Backend/Controllers/template.controller.php";
require_once "Backend/Models/Productos_Model.php";
require_once "Backend/DAO/Productos_DAO.php";
require_once "Backend/Utils/action.php";

class Productos_Controller extends Controller
{

    //CONTROLLER ROUTE
    public const ROUTE = "productos";

    //ACTIONS ROUTING
    public const REGISTRAR_PRODUCTO = "registrarproducto";
    public const EDITAR_PRODUCTO = "editarproducto";
    public const VER_PRODUCTO = "verproducto";


    public $actions;

    public function __construct()
    {
        //parent::__construct($pathName);

        $this->actions = array(
            self::REGISTRAR_PRODUCTO =>      new Action("mostrarPaginaRegistro", "crearProducto"),
            self::EDITAR_PRODUCTO =>         new Action(null, null),
            self::VER_PRODUCTO =>            new Action("mostrarProducto", null)
        );
    }

    public function ShowContent($paths)
    {
        //Determine wich method call TO A SPECIFIC ACTION SENDED IT IN THE URL
        Action::ValidateActionsPath($paths, $this);
    }

    public function mostrarPaginaRegistro($paths)
    {
        $test = 20;
        $allCategorias = Categorias_DAO::GetAllCategorias();
        include "View/Pages/agregar_Producto.php";
    }

    public function crearProducto($paths)
    {

        //AGREGAR PRODUCTO

        $idVendedor = $_SESSION['Usuario'];

        if (isset($_POST["precioProducto_input_name"])) {
            $precioEnModoVenta = $_POST["precioProducto_input_name"];
        } else {
            $precioEnModoVenta = null;
        }

        $producto = Productos_Model::createProducto(
            null,
            $idVendedor,
            htmlspecialchars($_POST["nombreProducto_input_name"]),
            htmlspecialchars($_POST["descripProducto_textarea_name"]),
            htmlspecialchars($_POST["modoVenta_select_name"]),
            $precioEnModoVenta,
            htmlspecialchars($_POST["cantidadProducto_input_name"]),
            null,
            null
        );

        $resultAgregarProducto = Productos_DAO::productos_ABC("Insert", $producto);
        $args = array("result" => $resultAgregarProducto);

        $Id_Producto = Productos_DAO::GetUltimoProductoAgregado(); //Producto recien agregado

        if ($resultAgregarProducto == true) {
            //AGREGAR IMAGENES
            $contarImagenes = count($_FILES['imagenesProducto_input_name']['name']);
            for ($i = 0; $i < $contarImagenes; $i++) {

                $imagen = file_get_contents($_FILES['imagenesProducto_input_name']['tmp_name'][$i]);
                $resultAgregarImagen = Productos_DAO::agregarImagenProducto($Id_Producto, $imagen);
            }
            //AGREGAR VIDEOS
            $contarVideos = count($_FILES['videosProducto_input_name']['tmp_name']);
            for ($i = 0; $i < $contarVideos; $i++) {

                $video = file_get_contents($_FILES['videosProducto_input_name']['tmp_name'][$i]);
                $resultAgregarVideo = Productos_DAO::agregarVideoProducto($Id_Producto, $video);
            }
            //AGREGAR CATEGORIA DE PRODUCTO
            foreach ($_POST['categoriasProducto_select_name'] as $categoria) {
                $resultAgregarCategoria = Productos_DAO::agregarCategoriaProducto($Id_Producto, $categoria);
            }

            header("location: ../productos/registrarproducto");
        } else {
            echo '<script language="JavaScript"> 
                        alert("no se pudo agregar el PRODUCTO");
                  </script>';
            include "View/Pages/agregar_Producto.php";
        }
    }

    public function mostrarProducto($paths)
    {
        $test = 20;
        if (isset($paths[2])) {

            $producto = Productos_DAO::GetProductoById($paths[2]);

            include "View/Pages/producto.php";
            
        } else {
            include "View/error.php";
        }

        
    }
}
