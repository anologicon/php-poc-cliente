<?php

namespace PoC\Domain\Service;

use DateTime;
use PoC\Infrastructure\Repository\Log as LogRepository;
use PoC\Model\Log as ModelLog;

class Log
{   
    private $repository;

    public function __construct() {
        $this->repository = new LogRepository();
    }

    public function saveAction(string $actionDescribed)
    {
        return $this->repository->saveNewAction(
            $this->newLogAction($actionDescribed)
        );
    }

    private function newLogAction(string $actionDescribed): ModelLog
    {
        $newModelLog = new ModelLog;

        $dateTimeNow = new DateTime("now");

        $newModelLog->setAction($actionDescribed);
        $newModelLog->setDateCreation($dateTimeNow);
        
        return $newModelLog;
    }
}
