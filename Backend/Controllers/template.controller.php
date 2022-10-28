<?php
require_once "Backend/Controllers/controller.php";
require_once "Backend/Controllers/Home_Controller.php";
require_once "Backend/Controllers/about.controller.php";
require_once "Backend/Controllers/Usuarios_Controller.php";
require_once "Backend/Controllers/Categorias_Controller.php";
require_once "Backend/Controllers/Productos_Controller.php";
require_once "Backend/Controllers/Session_Controller.php";



class Template {
    private $controllers;
    //It must come from the DB
    public const ROOT_PATH = "/proyecto_bdm/";
    public function __construct(){
        $this->InitializeControllers();
    }
    public function ShowTemplate(){
        // if(session_status() == PHP_SESSION_ACTIVE) {
        
            include "View/HeaderFooter_Template.php";
            // $usernav = UserModel::GetUser($_SESSION["User"]);

        // }else{
            
        //     include "View/Template.php";
        // }
        
    }
    public function InitializeControllers(){
        $this->controllers = array(Home_Controller::ROUTE => new Home_Controller(),
                                    AboutController::ROUTE=> new AboutController(),
                                    Usuarios_Controller::ROUTE=> new Usuarios_Controller(),
                                    Categorias_Controller::ROUTE=> new Categorias_Controller(),
                                    Productos_Controller::ROUTE=> new Productos_Controller(),
                                    Session_Controller::ROUTE=> new Session_Controller());

    }
    //Determinar que controlador se va a usar para cada pagina 
    public function DeterminePage(){
        Controller::ValidateControllersPath($this->controllers);
    }

    public function CallScripts(){
        if(function_exists("Scripts")){
            call_user_func("Scripts");
        }
    }

   

    public static function Route($controller, $action){
        $route = self::ROOT_PATH;
        if($action != null)
            $route = self::ROOT_PATH.$controller."/".$action;
        else
            $route = self::ROOT_PATH.$controller;
        return $route;
    }

   
}


