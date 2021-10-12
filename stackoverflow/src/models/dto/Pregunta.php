<?php

namespace App\Stackoverflow\models\dto;

class Pregunta
{
    public int $id;
    public string $snombre;
    public string $pregunta;

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
    public function getPregunta(): string
    {
        return $this->pregunta;
    }

    /**
     * @param string $pregunta
     */
    public function setPregunta(string $pregunta): void
    {
        $this->pregunta = $pregunta;
    }



}