<?php

namespace PoC\Domain\Entity;

/**
 * Trait for domain entity
 */
trait EntityTrait
{   
    public function getTable()
    {
        return $this->table;
    }
}
