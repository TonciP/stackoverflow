<?php

namespace App\Stackoverflow\controller;


use App\Stackoverflow\models\bll\respuestaBLL;
use App\Stackoverflow\models\dto\Pregunta;
use App\Stackoverflow\utils\ValidationUtils;

class RespuestaController
{
    /**
     * Obtener lista de personas
     */
    static function index()
    {
        $respuestaBLL = new respuestaBLL();
        $lista = $respuestaBLL->selectAll();

        echo json_encode($lista);

    }

    /**
     * Obtiene el detalle de un solo elemento por ID
     * @param $id int
     */
    static function show($id)
    {
        $respuestaBLL = new respuestaBLL();
        $objRespuesta = $respuestaBLL->select($id);
        if ($objRespuesta == null) {
            http_response_code(404);
            return;
        }
        echo json_encode($objRespuesta);
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
        if (!ValidationUtils::validarRequest($request, 'srespuesta')) {
            return;
        }

        $srespuesta = $request->srespuesta;
        if (!ValidationUtils::validarRequest($request, 'idpregunta')) {
            return;
        }
        $idpregunta = $request->idpregunta;
        $respuestaBLL = new respuestaBLL();
        $id = $respuestaBLL->insert($snombre, $srespuesta, $idpregunta);
        $objRespuesta = $respuestaBLL->select($id);
        echo json_encode($objRespuesta);
    }

    /**
     * Actualizar datos de una persona
     */
    static function updatePut($request, $id)
    {
        $respuestaBLL = new respuestaBLL();
        $objRespuesta = $respuestaBLL->select($id);
        if ($objRespuesta == null) {
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
        if (!ValidationUtils::validarRequest($request, 'srespuesta')) {
            return;
        }
        $srespuesta = $request->srespuesta;
        if (!ValidationUtils::validarRequest($request, 'idpregunta')) {
            return;
        }
        $idpregunta = $request->idpregunta;

        $respuestaBLL->update($snombre, $srespuesta, $idpregunta,$id);
        $objRespuesta = $respuestaBLL->select($id);
        echo json_encode($objRespuesta);
    }

    /**
     * Actualizar datos de una persona
     */
    static function updatePatch($request, $id)
    {
        $respuestaBLL = new respuestaBLL();
        $objRespuesta = $respuestaBLL->select($id);
        if ($objRespuesta == null) {
            http_response_code(404);
            return;
        }
        if ($request == null) {
            http_response_code(400);
            echo "request mal formado";
            return;
        }
        $snombre = $objRespuesta->getSnombre();
        $srespuesta = $objRespuesta->getSrespuesta();
        $idpregunta = $objRespuesta->getIdpregunta();
        if (property_exists($request, 'snombre')) {
            $snombre = $request->snombre;
        }

        if (property_exists($request, 'srespuesta')) {
            $srespuesta = $request->srespuesta;
        }

        if (property_exists($request, 'idpregunta')) {
            $idpregunta= $request->idpregunta;
        }

        $respuestaBLL = new respuestaBLL();
        $respuestaBLL->update($snombre, $srespuesta, $idpregunta, $id);
        $objRespuesta = $respuestaBLL->select($id);
        echo json_encode($objRespuesta);
    }

    /**
     * Eliminar persona por Id
     * @param $id int
     */
    static function destroy($id)
    {
        $respuestaBLL = new respuestaBLL();
        $obj = $respuestaBLL->select($id);
        if ($obj == null) {
            http_response_code(404);
            return;
        }
        $respuestaBLL->delete($id);
        $respuesta = array(
            "res" => "success"
        );
        echo json_encode($respuesta);
    }
}