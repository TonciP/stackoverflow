<?php

namespace App\Stackoverflow\models\dto;

class Repuesta
{
    public int $id;
    public string $snombre;
    public string $srespuesta;
    public float $idpregunta;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSnombre(): string
    {
        return $this->snombre;
    }

    /**
     * @param string $snombre
     */
    public function setSnombre(string $snombre): void
    {
        $this->snombre = $snombre;
    }

    /**
     * @return string
     */
    public function getSrespuesta(): string
    {
        return $this->srespuesta;
    }

    /**
     * @param string $srespuesta
     */
    public function setSrespuesta(string $srespuesta): void
    {
        $this->srespuesta = $srespuesta;
    }

    /**
     * @return float
     */
    public function getIdpregunta(): float
    {
        return $this->idpregunta;
    }

    /**
     * @param float $idpregunta
     */
    public function setIdpregunta(float $idpregunta): void
    {
        $this->idpregunta = $idpregunta;
    }



}