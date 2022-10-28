<?php

require_once "Backend/Controllers/template.controller.php";


class Home_Controller extends Controller {
    // CONTROLLER ROUTE
    public const ROUTE = "inicio";

    //ACTIONS ROUTE
    public const INDEX = "index";
    public const DASHBOARD = "dashboard";


    public $actions;
    
    public function __construct(){
        $this->actions = array(self::INDEX => new Action("Index", null),
                                self::DASHBOARD => new Action("verDashboard", null));
    }

    public function ShowContent($paths) {
        //Determine wich method call
       Action::ValidateActionsPath($paths, $this);

    }


    public function Index($paths) {
        $nombre = "BDM";
        ob_end_clean();
        include "View/Pages/home/index.php";
        die();
    }

    public function verDashboard($paths) {
        include "View/Pages/dashboard.php";
    }

}