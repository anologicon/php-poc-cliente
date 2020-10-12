<?php

namespace PoC\Model;

use DateTime;

class Log
{    
    private $id;

    private $acao;
    
    private $dataCriacao;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getAction(): ?string
    {
        return $this->acao;
    }

    public function getDateCreation(): ?string
    {
        return $this->dataCriacao->format('Y-m-d H:i:s');
    }

    public function setAction(string $actionDescribed): void
    {
        $this->acao = $actionDescribed;
    }

    public function setDateCreation(DateTime $dateTime): void
    {
        $this->dataCriacao = $dateTime;
    }
}
