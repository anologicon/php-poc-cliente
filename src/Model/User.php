<?php

namespace PoC\Model;

class User
{   
    private $id;

    private $nome;

    private $cpf;

    private $email;

    private $telefone;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->nome = $name;
    }

    public function setCpf(int $cpf)
    {
        $this->cpf = $cpf;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPhone(string $phoneNumber)
    {
        $this->telefone = $phoneNumber;
    }

    public function getName()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->telefone;
    }

    public function getId()
    {
        return $this->id;
    }
}
