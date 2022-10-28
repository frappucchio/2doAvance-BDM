<?php

require_once "Backend/Controllers/template.controller.php";
require_once "Backend/Models/Usuarios_Model.php";
require_once "Backend/Utils/action.php";


class Session_Controller extends Controller {
    //CONTROLLER ROUTE
    public const ROUTE = "login";

    //ACTIONS ROUTING
    public const INICIAR_SESION = "iniciarsesion";
    public const CERRAR_SESION = "cerrarsesion";



    public $actions;

    public function __construct(){
        //parent::__construct($pathName);

        $this->actions = array(self::INICIAR_SESION=> new Action("verLogin", "iniciarSesion"),
                                self::CERRAR_SESION => new Action("cerrarSesion",  null));
    }

    public function ShowContent($paths) {
        //Determine wich method call TO A SPECIFIC ACTION SENDED IT IN THE URL
        Action::ValidateActionsPath($paths, $this);
    }


    public function verLogin($paths){       

        $test = 20;

        ob_end_clean();
       include "View/Pages/login.php";
       die();
    }

    
    public function iniciarSesion($paths) {
        
        $usuarioLogeado = new Usuarios_Model();

        $usuarioLogeado = Usuarios_DAO::Login_Usuario($_POST["username_input_name"], $_POST["password_input_name"]);

        

        $args = array("usuarioLogeado" => $usuarioLogeado);

        if($usuarioLogeado->getId_Usuario() !== null){

            session_start();
            $_SESSION['Usuario']= $usuarioLogeado->getId_Usuario();

            //include "inicio/dashboard";
            header("location: ../inicio/dashboard");
        }
        else{
            ob_end_clean();
            include "View/Pages/login.php";
            // echo '<script language="javascript">';
            // echo 'swal("Usuario invalido", "In", "error");';
            // echo '</script>';
            
            die();
        }   

                 
       
    }

    public function cerrarSesion() {
        session_unset();
        session_destroy();
        //session_start();
        //unset($_SESSION["Usuario"]);

        //echo "<script>window.location.href='/proyecto_bdm/';</script>";
        header("location: /proyecto_bdm/");
        exit;


    }

 
}
