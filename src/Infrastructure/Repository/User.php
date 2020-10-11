<?php

namespace PoC\Infrastructure\Repository;

use PoC\Infrastructure\Crud;
use PoC\Domain\Entity\User as UserEntity;

class User extends Crud
{
    public function __construct() {
        $userEntity = new UserEntity();
        
        $this->table = $userEntity->getTable();
    }

    public function fetchAll()
    {
        return $this->read();
    }
}
