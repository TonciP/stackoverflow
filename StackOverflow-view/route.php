<?php

use App\Stackoverflow\controller\ControllerPrincipal;

$controller = "principal";

if (isset($_REQUEST['controller'])){
    $controller = $_REQUEST['controller'];
}
$action = "index";
if (isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}

switch ($controller){
    case "principal":
        switch ($action){
            case "index":
                if ($_SERVER["REQUEST_METHOD"] != 'GET'){
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                ControllerPrincipal::paginaPrincipal();
                break;
            case "detallePregunta":
                if ($_SERVER["REQUEST_METHOD"] != 'GET'){
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                ControllerPrincipal::detallePregunta($_GET['id']);
                break;
        }
        break;
    case "moderador":
        switch ($action){
            case "index":
                if ($_SERVER["REQUEST_METHOD"] != 'GET'){
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                ControllerPrincipal::moderador();
                break;
        }
        break;

}