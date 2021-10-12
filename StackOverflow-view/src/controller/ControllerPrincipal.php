<?php
namespace App\Stackoverflow\controller;

class ControllerPrincipal
{
    public static function paginaPrincipal(){
        include_once "src/view/principalView.php";
    }
    public static function detallePregunta($request){
        if ($request == null) {
            http_response_code(400);
            echo "request mal formado";
            return;
        }
        $idpregunta = $request;
        include_once "src/view/detallePregunta.php";
    }
    public static function moderador(){
        include_once "src/view/moderadorVIew.php";
    }
}