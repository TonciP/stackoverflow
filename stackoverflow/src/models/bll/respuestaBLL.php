<?php

namespace App\Stackoverflow\models\bll;

use App\Stackoverflow\models\dto\Repuesta;
use App\Stackoverflow\models\dto\respuesta;
use App\Stackoverflow\models\conn\Connection;
use PDO;

class respuestaBLL
{
    public function __construct()
    {
    }
    public function selectAll(){
        $conn = new Connection();
        $res = $conn->query(
          "SELECT id, snombre, srespuesta, idpregunta FROM respuesta"
        );
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $obj = $this->rowToDto($row);
            $listaDatos[] = $obj;
        }
        return $listaDatos;

    }
    public function select($id){
        $conn = new Connection();
        $res = $conn->queryWithParams(
          "SELECT id, snombre, srespuesta,idpregunta FROM respuesta
          WHERE id = :varid",
            array(
                ":varid" =>$id
            )
        );
        $row = $res->fetch(PDO::FETCH_ASSOC);
            $obj = $this->rowToDto($row);
            $listaDatos = $obj;
        return $listaDatos;

    }


    public function insert(
        $snombre, $srespuesta, $idpregunta
    ){
        $conn = new Connection();
        $res = $conn->queryWithParams(
          "INSERT INTO respuesta(snombre, srespuesta, idpregunta)
                VALUES (:varsnombre, :varsrespuesta, :varidpregunta)",
            array(
                ":varsnombre"=>$snombre,
                ":varsrespuesta"=>$srespuesta,
                ":varidpregunta"=>$idpregunta
            )
        );
        return $conn->getLastInsertedId();
    }
    public function delete($id){
        $conn = new Connection();
        $res = $conn->queryWithParams(
          "DELETE FROM respuesta WHERE id = :varid",
          array(
              ":varid"=>$id
          )
        );

    }
    public function update($snombre, $srespuesta,$idpregunta, $id)
    {
        $conn = new Connection();
        $res = $conn->queryWithParams(
            "UPDATE respuesta SET snombre = :varsnombre, srespuesta = :varsrespuesta, idpregunta = :varidpregunta WHERE id = :varid",
            array(
                ":varid"=> $id,
                ":varsnombre"=>$snombre,
                ":varidpregunta"=>$idpregunta,
                ":varsrespuesta"=>$srespuesta
            )
        );

    }

    public function selectByIdpregunta($idpregunta){
        $conn = new Connection();
        $res = $conn->queryWithParams(
            "SELECT id, snombre, srespuesta,idpregunta FROM respuesta
          WHERE idpregunta = :varidpregunta",
            array(
                ":varidpregunta" =>$idpregunta
            )
        );

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $obj = $this->rowToDto($row);
            $listaDatos[] = $obj;
        }
        if (isset($listaDatos)){
            return $listaDatos;
        }else{
            return null;
        }


    }
    private function rowToDto($row): ?Repuesta
    {
        $objrespuesta= new Repuesta();
        $objrespuesta->setId($row['id']);
        $objrespuesta->setSnombre($row['snombre']);
        $objrespuesta->setSrespuesta($row['srespuesta']);
        $objrespuesta->setIdpregunta($row['idpregunta']);
        return $objrespuesta;
    }

}