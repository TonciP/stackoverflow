<?php

namespace App\Stackoverflow\controller;

use App\Stackoverflow\models\bll\respuestaBLL;
use App\Stackoverflow\models\bll\preguntaBLL;
use App\Stackoverflow\models\dto\Pregunta;
use App\Stackoverflow\utils\ValidationUtils;

class PreguntaController
{
    /**
     * Obtener lista de personas
     */
    static function index()
    {
        $preguntaBLL = new preguntaBLL();
        $lista = $preguntaBLL->selectAll();

        echo json_encode($lista);

    }

    /**
     * Obtiene el detalle de un solo elemento por ID
     * @param $id int
     */
    static function show($id)
    {
        $preguntaBLL = new preguntaBLL();
        $objPregunta = $preguntaBLL->select($id);
        if ($objPregunta == null) {
            http_response_code(404);
            return;
        }
        echo json_encode($objPregunta);
    }

    /**
     * Insertar los datos de una persona
     * @param Pregunta
     */
    static function store($request)
    {
        if ($request == null) {
            http_response_code(400);
            echo "request mal formado";
            return;
        }

        if (!ValidationUtils::validarRequest($request, 'snombre')) {
            return;
        }
        $snombre = $request->snombre;
        if (!ValidationUtils::validarRequest($request, 'spregunta')) {
            return;
        }

        $spregunta = $request->spregunta;

        $preguntaBLL = new PreguntaBLL();
        $id = $preguntaBLL->insert($snombre, $spregunta);
        $objPregunta = $preguntaBLL->select($id);
        echo json_encode($objPregunta);
    }

    /**
     * Actualizar datos de una persona
     */
    static function updatePut($request, $id)
    {
        $preguntaBLL = new preguntaBLL();
        $objPregunta = $preguntaBLL->select($id);
        if ($objPregunta == null) {
            http_response_code(404);
            return;
        }
        if ($request == null) {
            http_response_code(400);
            echo "request mal formado";
            return;
        }
        if (!ValidationUtils::validarRequest($request, 'snombre')) {
            return;
        }
        $snombre = $request->snombre;
        if (!ValidationUtils::validarRequest($request, 'spregunta')) {
            return;
        }
        $spregunta = $request->spregunta;

        $preguntaBLL->update($snombre, $spregunta, $id);
        $objPregunta = $preguntaBLL->select($id);
        echo json_encode($objPregunta);
    }

    /**
     * Actualizar datos de una persona
     */
    static function updatePatch($request, $id)
    {
        $preguntaBLL = new preguntaBLL();
        $objPregunta = $preguntaBLL->select($id);
        if ($objPregunta == null) {
            http_response_code(404);
            return;
        }
        if ($request == null) {
            http_response_code(400);
            echo "request mal formado";
            return;
        }
        $snombre = $objPregunta->getSnombre();
        $spregunta = $objPregunta->getPregunta();
        if (property_exists($request, 'snombre')) {
            $snombre = $request->snombre;
        }

        if (property_exists($request, 'spregunta')) {
            $spregunta = $request->spregunta;
        }


        $preguntaBLL = new preguntaBLL();
        $preguntaBLL->update($snombre, $spregunta, $id);
        $objPregunta = $preguntaBLL->select($id);
        echo json_encode($objPregunta);
    }

    /**
     * Eliminar persona por Id
     * @param $id int
     */
    static function destroy($id)
    {
        $preguntaBLL = new preguntaBLL();
        $obj = $preguntaBLL->select($id);
        if ($obj == null) {
            http_response_code(404);
            return;
        }
        $preguntaBLL->delete($id);
        $respuesta = array(
            "res" => "success"
        );
        echo json_encode($respuesta);
    }

    static function respuestaByIdpregunta($idpregunta){
        $respuestaBLL = new respuestaBLL();
        $listpregunta = $respuestaBLL->selectByIdpregunta($idpregunta);
        if ($listpregunta == null){
            echo json_encode(false);
        }else{
            echo json_encode($listpregunta);
        }

    }

}