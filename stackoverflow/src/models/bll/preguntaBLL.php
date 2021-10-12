<?php

namespace App\Stackoverflow\models\bll;

use App\Stackoverflow\models\conn\Connection;
use PDO;
use App\Stackoverflow\models\dto\Pregunta;

class preguntaBLL
{
    public function __construct()
    {
    }
    public function selectAll(){
        $conn = new Connection();
        $res = $conn->query(
            "SELECT id, snombre, spregunta FROM pregunta"
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
            "SELECT id, snombre, spregunta FROM pregunta
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
        $snombre, $spregunta
    ){
        $conn = new Connection();
        $res = $conn->queryWithParams(
            "INSERT INTO pregunta(snombre, spregunta)
                VALUES (:varsnombre, :varspregunta)",
            array(
                ":varsnombre"=>$snombre,
                ":varspregunta"=>$spregunta
            )
        );
        return $conn->getLastInsertedId();
    }
    public function delete($id){
        $conn = new Connection();
        $res = $conn->queryWithParams(
            "DELETE FROM pregunta WHERE id = :varid",
            array(
                ":varid"=>$id
            )
        );

    }
    public function update($snombre, $spregunta, $id)
    {
        $conn = new Connection();
        $res = $conn->queryWithParams(
            "UPDATE pregunta SET snombre = :varsnombre, spregunta = :varspregunta WHERE id = :varid",
            array(
                ":varsnombre"=>$snombre,
                ":varspregunta"=>$spregunta,
                ":varid"=>$id
            )
        );

    }
    private function rowToDto($row): Pregunta
    {
        $objpregunta= new Pregunta();
        $objpregunta->setId($row['id']);
        $objpregunta->setSnombre($row['snombre']);
        $objpregunta->setPregunta($row['spregunta']);
        return $objpregunta;
    }
}