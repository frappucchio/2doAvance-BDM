<?php

abstract class Controller {
    protected $template;

    public function __construct(){
        //$this->pathName = strtolower($pathName);
    }

    public function GetPathName(){
        return $this->pathName;
    }

    public static function ValidateControllersPath($controllers){
        if(isset($_GET["page"])){
            
            $paths = explode("/", strtolower($_GET["page"]));//Dividir VALOR DE index.php?page= entre cada "/"
            if(isset($paths[0])){
                
                // Setting the get variables depending on the url query
                $url = parse_url($_SERVER['REQUEST_URI']);
                parse_str($url["query"] ?? null, $_GET);//guardar query si no es null, en GET

                if(isset($controllers[$paths[0]])){    //buscar si en array controllers, hay alguna llave llamada ... dentro de paths[0]

                    $controllers[$paths[0]]->ShowContent($paths);
                    return;
                } 

                
                include 'View/error.php';
                
            } else {
                $controllers[Home_Controller::ROUTE]->ShowContent($paths);
            }

            return; 
        }
        

        $controllers[Home_Controller::ROUTE]->ShowContent(null);

    }

    

    abstract public function ShowContent($paths);

    //abstract public function Index($paths);
  

}