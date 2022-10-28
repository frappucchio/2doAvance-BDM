<?php 


class Action {


    private $getCallback;
    private $postCallback;

    public function __construct($getCallback, $postCallback){
        $this->getCallback = $getCallback;
        $this->postCallback = $postCallback;
    }

    public function Invoke($controller, $paths){
        if($_SERVER["REQUEST_METHOD"] == "GET"){

            call_user_func(array($controller, $this->getCallback), $paths);

        } else if($_SERVER["REQUEST_METHOD"] == "POST"){
            call_user_func(array($controller, $this->postCallback), $paths);
        }

    }

    public static function ValidateActionsPath($paths, $controller){
        
        //It's always expecting for a index method to be call in the default scenario when nothing is sent to the controller
        if(isset($paths[1])){
            if(isset($controller->actions[$paths[1]])){
                $controller->actions[$paths[1]]->Invoke($controller, $paths);
                return;
            }
            $controller->actions["index"]->Invoke($controller, $paths);
        } else {
            $controller->actions["index"]->Invoke($controller, $paths);
        }


    }










}