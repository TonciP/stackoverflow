<?php
use App\Stackoverflow\controller\RespuestaController;
use App\Stackoverflow\controller\PreguntaController;

//required_auth();

$controller = "";
if (isset($_REQUEST['controller'])){
    $controller = $_REQUEST['controller'];
}
$action = "";
if (isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}

switch ($controller){
    case 'pregunta':
        switch ($action){
            case 'index':
                if ($_SERVER['REQUEST_METHOD'] !== 'GET'){
                    http_response_code(405);
                    echo "bad method";
                }
                PreguntaController::index();
                break;
            case 'show':
                if ($_SERVER["REQUEST_METHOD"] !== "GET") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                PreguntaController::show($_GET['id']);
                break;
            case 'storage':
                if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                $body = json_decode(file_get_contents("php://input"));
                PreguntaController::store($body);
                break;
            case 'update':
                $body = json_decode(file_get_contents("php://input"));
                if ($_SERVER["REQUEST_METHOD"] !== "PUT") {
                    PreguntaController::updatePut($body, $_GET['id']);
                    return;
                }
                if ($_SERVER["REQUEST_METHOD"] !== "PATCH") {
                    PreguntaController::updatePatch($body, $_GET['id']);
                    return;
                }
                http_response_code(405);
                echo "bad method";
                break;
            case 'destroy':
                if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                PreguntaController::destroy($_GET['id']);
                break;
            case 'respuestaByIdpregunta':
                if ($_SERVER["REQUEST_METHOD"] !== "GET") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                PreguntaController::respuestaByIdpregunta($_GET['idpregunta']);
                break;
        }
        break;
    case 'respuesta':
        switch ($action){
            case 'index':
                if ($_SERVER['REQUEST_METHOD'] !== 'GET'){
                    http_response_code(405);
                    echo "bad method";
                }
                RespuestaController::index();
                break;
            case 'show':
                if ($_SERVER["REQUEST_METHOD"] !== "GET") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                RespuestaController::show($_GET['id']);
                break;
            case 'storage':
                $body = json_decode(file_get_contents("php://input"));
                RespuestaController::store($body);
                break;
            case 'update':
                $body = json_decode(file_get_contents("php://input"));
                if ($_SERVER["REQUEST_METHOD"] !== "PUT") {
                    RespuestaController::updatePut($body, $_GET['id']);
                    return;
                }
                if ($_SERVER["REQUEST_METHOD"] !== "PATCH") {
                    RespuestaController::updatePatch($body, $_GET['id']);
                    return;
                }
                http_response_code(405);
                echo "bad method";
                break;
            case 'destroy':
                if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
                    http_response_code(405);
                    echo "bad method";
                    return;
                }
                RespuestaController::destroy($_GET['id']);
                break;
        }

        break;

}

function required_auth(){
    $AUTH_USER = 'admin';
    $AUTH_PASS = 'admin';
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
    $is_not_authenticared = (
        !$has_supplied_credentials ||
        $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
        $_SERVER['PHP_AUTH_PW'] != $AUTH_PASS
    );

    if ($is_not_authenticared){
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        exit();
    }
}
