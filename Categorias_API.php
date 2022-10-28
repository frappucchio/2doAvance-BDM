<?php

require_once "Backend/DAO/Categorias_DAO.php";
require_once "Backend/Models/Categorias_Model.php";


$response = array();

/*if(isset($_POST)){

    $postBody = file_get_contents("php://input");

   // session_start();

    $controller = new Categorias_DAO();

    $nombre = $_POST['nombreCategoria_input_name'];
    $descripcion = $_POST['descripCategoria_textarea_name'];

    $category = Categorias_Model::createCategoria(
        null,
       htmlspecialchars($_POST["nombreCategoria_input_name"]),
       htmlspecialchars($_POST["descripCategoria_textarea_name"]),
       null
      // htmlspecialchars($_POST["UsuarioCreador_input_name"])
    );


   $controller->categorias_ABC('Insert',$category);

   if($controller){
    $response['nombre:'] = $nombre;
    $response['descripcion:'] = $descripcion;

    $response['suceso:'] = true;
   }else{
    $response['suceso:'] = false;
   }

}else{
    $response['suceso:'] = false;
}
die(json_encode($response));*/

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':{
        $categorias = new Categorias_DAO();
        $categoria = array();
        $categoria["items"] = array();
    
        $res = $categorias->GetAllCategorias();
    
        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_Categoria'],
                    'nombre' => $row['Nombre_Categoria'],
                    'descrip' => $row['Descrip_Categoria'],
                    'creador' => $row['UsuarioCreador_Categoria'] 
                );
                array_push($categoria['items'],$item);
            }
            echo json_encode($categoria);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos registrados'));
        }   
    }
    break;
    case 'POST':{
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $postBody = file_get_contents("php://input");
        
             session_start();
         
             
             $controller = new Categorias_DAO();
         
             $nombre = $_POST['nombreCategoria_input_name'];
             $descripcion = $_POST['descripCategoria_textarea_name'];

             if($nombre != "" && $descripcion != ""){
                $category = Categorias_Model::createCategoria(
                    null,
                   htmlspecialchars($_POST["nombreCategoria_input_name"]),
                   htmlspecialchars($_POST["descripCategoria_textarea_name"]),
                   htmlspecialchars($_POST["UsuarioCreador_input_name"])
                );
            
            
               $result = $controller->categorias_ABC('Insert',$category);
               $args = array("result" => $result);
            
               if($controller and $result){
                $response['nombre'] = $nombre;
                $response['descripcion'] = $descripcion;
                //echo '<script language="javascript">alert("guardado");</script>';
                $response['suceso'] = true;
               }else{
                $response['suceso'] = false;
                //echo '<script language="javascript">alert("NO guardado");</script>';
                //aqui tiene que redirrecionar o darle refresh a la pagina
               }

            //    if($result == true){
            //         echo '<script language="javascript">alert("guardado");</script>';
            //    }else{
            //         echo '<script language="javascript">alert("NO guardado");</script>';
            //    }
             }else{
                $datos = json_decode($postBody);
                if($datos != NULL){
                    $category = Categorias_Model::createCategoria(
                        null,
                        $datos->Nombre_Categoria,
                        $datos->Descrip_Categoria,
                        $datos->UsuarioCreador_Categoria
                    );
                    $controller->categorias_ABC('Insert',$category);
                    http_response_code(200);
                }else{
                    http_response_code(405);
                }
                
             }
            
        }else{
            $response['suceso:'] = false;
            //echo '<script language="javascript">alert("soy false despues del if 2");</script>';
        }
        die(json_encode($response));
    }
    break;
}



/*if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postBody = file_get_contents("php://input");

     session_start();
 
     $controller = new Categorias_DAO();
 
     $nombre = $_POST['nombreCategoria_input_name'];
     $descripcion = $_POST['descripCategoria_textarea_name'];
 
     $category = Categorias_Model::createCategoria(
         null,
        htmlspecialchars($_POST["nombreCategoria_input_name"]),
        htmlspecialchars($_POST["descripCategoria_textarea_name"]),
        htmlspecialchars($_POST["UsuarioCreador_input_name"])
     );
 
 
    $controller->categorias_ABC('Insert',$category);
 
    if($controller){
     $response['nombre:'] = $nombre;
     $response['descripcion:'] = $descripcion;
 
     $response['suceso:'] = true;
    }else{
     $response['suceso:'] = false;
     echo '<script language="javascript">alert("soy false dentro del if");</script>';
    }
    
}else{
    $response['suceso:'] = false;
    echo '<script language="javascript">alert("soy false despues del if 2");</script>';
}
die(json_encode($response));

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $categorias = new Categorias_DAO();
    $categoria = array();
    $categoria["items"] = array();

    $res = $categorias->GetAllCategorias();

    if($res->rowCount()){
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            $item = array(
                'id' => $row['Id_Categoria'],
                'nombre' => $row['Nombre_Categoria'],
                'descrip' => $row['Descrip_Categoria'],
                'creador' => $row['UsuarioCreador_Categoria'] 
            );
            array_push($categoria['items'],$item);
        }
        echo json_encode($categoria);
    }else{
        echo json_encode(array('mensaje' => 'No hay elementos registrados'));
    }
}*/
