<?php

namespace PoC\Infrastructure\Repository;

use PoC\Infrastructure\Crud;
use PoC\Domain\Entity\Log as LogEntity;
use PoC\Model\Log as ModelLog;

class Log extends Crud
{
    public function __construct() {
        $logEntity = new LogEntity();
        
        $this->table = $logEntity->getTable();
    }

    public function saveNewAction(ModelLog $logModel)
    {
        return $this->save([
            'acao' => $logModel->getAction(),
            'data_criacao' => $logModel->getDateCreation(),
        ]);
    }
}
