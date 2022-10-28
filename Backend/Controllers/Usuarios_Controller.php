<?php

require_once "Backend/Controllers/template.controller.php";
require_once "Backend/Models/Usuarios_Model.php";
require_once "Backend/DAO/Usuarios_DAO.php";
require_once "Backend/Utils/action.php";

class Usuarios_Controller extends Controller
{
    //CONTROLLER ROUTE
    public const ROUTE = "usuarios";

    //ACTIONS ROUTING
    public const REGISTRAR_USUARIO = "registrarusuario";
    public const EDITAR_USUARIO = "editarusuario";
    public const ELIMINAR_USUARIO = "eliminarusuario";
    public const MOSTRAR_PERFIL_USUARIO = "perfilusuario";
    public const OPCION_PERFIL_USUARIO = "opcionperfilusuario";

    public const SHOW_ALL_USERS = "mostrar";

    public const AJAX = "ajax";


    public $actions;

    public function __construct()
    {
        //parent::__construct($pathName);

        $this->actions = array(
            self::REGISTRAR_USUARIO =>      new Action("mostrarPaginaRegistro", "crearUsuario"),
            self::EDITAR_USUARIO =>         new Action(null, null),
            self::MOSTRAR_PERFIL_USUARIO => new Action("mostrarPerfilUsuario", "editarUsuario"),
            self::ELIMINAR_USUARIO =>       new Action(null, "eliminarUsuario"),
            self::SHOW_ALL_USERS =>         new Action("ShowAllUsers", null),
            self::AJAX =>                   new Action(null, "Ajax")
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
        ob_end_clean();
        include "View/Pages/register.php";
        die();
    }

    public function crearUsuario($paths)
    {

        $user = Usuarios_Model::createUsuario(
            null,
            htmlspecialchars($_POST["username_input_name"]),
            htmlspecialchars($_POST["password_input_name"]),
            htmlspecialchars($_POST["btnradio"]),
            htmlspecialchars($_POST["correo_input_name"]),
            file_get_contents($_FILES["imagen_input_name"]["tmp_name"]),
            htmlspecialchars($_POST["nombre_input_name"]),
            htmlspecialchars($_POST["apellidoP_input_name"]),
            htmlspecialchars($_POST["apellidoM_input_name"]),
            htmlspecialchars($_POST["nacimiento_input_name"]),
            htmlspecialchars($_POST["genero_select_name"]),
            null,
            1,
            null
        );

        //$result = $user->InsertUser($user);

        $result = Usuarios_DAO::usuarios_ABC("Insert", $user);


        $args = array("result" => $result);



        if ($result == true) {

            $usuarioLogeado = Usuarios_DAO::GetUserByAlias_Usuario($_POST["username_input_name"]);
            $_SESSION['Usuario'] = $usuarioLogeado->getId_Usuario();

            header("location: ../inicio/dashboard");
        } else {
            ob_end_clean();
            include "View/Pages/register.php";
            die();
        }
    }

    // public function EditUser($paths)
    // {

    //     if (isset($paths[2])) {

    //         $user = Usuarios_DAO::GetUserById($paths[2]);


    //         include "View/Pages/users/index.php";
    //     } else {
    //         include "View/error.php";
    //     }
    // }

    public function editarUsuario($paths)
    {

        
        //ELIMINAR USUARIO
        if (isset($_POST["eliminarUsuario_name"])) {

            // $lat = false;
            // echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

            //if ($lat == true) {
                $idToDelete = $_SESSION['Usuario'];

                $user = Usuarios_Model::createUsuario(
                    $idToDelete,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                );

                $result = Usuarios_DAO::usuarios_ABC("DeleteUserById", $user);

                if ($result) {
                    session_unset();
                    session_destroy();
                    header("location: /proyecto_bdm/");
                    exit;
                    die();
                } else {
                    include "View/error.php";
                }
            //}else{
                // echo '<script language="JavaScript"> 
                //         window.location="../usuarios/perfilusuario";
                //       </script>';
            //}
        } else { //EDITAR USUARIO

            //$idToEdit = $paths[2];
            $idToEdit = $_SESSION['Usuario'];

            $user = Usuarios_DAO::GetUserById($idToEdit);

            if ($_FILES["imagenEditar_input_name"]["tmp_name"] != "") {

                $imagen = file_get_contents($_FILES["imagenEditar_input_name"]["tmp_name"]);
            } else {
                $imagen = $user->getImagen_Usuario();
            }

            $user = Usuarios_Model::createUsuario(
                $idToEdit,
                htmlspecialchars($_POST["username_input_name"]),
                htmlspecialchars($_POST["password_input_name"]),
                null,
                htmlspecialchars($_POST["correo_input_name"]),
                $imagen,
                htmlspecialchars($_POST["nombre_input_name"]),
                htmlspecialchars($_POST["apellidoP_input_name"]),
                htmlspecialchars($_POST["apellidoM_input_name"]),
                htmlspecialchars($_POST["nacimiento_input_name"]),
                htmlspecialchars($_POST["genero_select_name"]),
                null,
                htmlspecialchars($_POST["privacidad_select_name"]),
                null
            );

            if (Usuarios_DAO::usuarios_ABC("EditUserById", $user) == true) {
                // header("Location: /proyecto_bdm/" . self::ROUTE . "/" . self::MOSTRAR_PERFIL_USUARIO);

                $idUsuarioLogeado = $_SESSION['Usuario'];
                $usuarioLogeado = Usuarios_DAO::GetUserById($idUsuarioLogeado);

                header("location: ../usuarios/perfilusuario");
                // echo '<script language="JavaScript"> 
                //         window.location="../usuarios/perfilusuario";
                //       </script>';

            } else {
                include "View/error.php";
            }
        }
    }

    public function mostrarPerfilUsuario($paths)
    {
        $idUsuarioLogeado = $_SESSION['Usuario'];
        $usuarioLogeado = Usuarios_DAO::GetUserById($idUsuarioLogeado);

        include "View/Pages/perfil_Usuario.php";
    }

    public function ShowAllUsers($paths)
    {

        $allUsers = Usuarios_DAO::GetAllUsers();

        include "View/Pages/users/index.php";
    }


    public function eliminarUsuario()
    {
        $idToDelete = $_SESSION['Usuario'];;


        $user = Usuarios_Model::createUsuario(
            $idToDelete,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
        );

        $result = Usuarios_DAO::usuarios_ABC("DeleteUserById", $user);

        if ($result) {
            session_unset();
            session_destroy();
            header("location: /proyecto_bdm/");
            exit;
            die();
        } else {
            include "View/error.php";
        }
    }

    public function Ajax($paths)
    {
        ob_end_clean();


        $name = $_POST["name"];
        $age = $_POST["age"];

        // Print any response in JSON format
        $response = array("response" => "I'm the response");
        echo json_encode($response);
        die();
    }
}
