<?php

namespace Poc\Domain\Entity;

use PoC\Domain\Entity\EntityTrait;

class User
{
    use EntityTrait;

    private $table = 'usuario';
}
