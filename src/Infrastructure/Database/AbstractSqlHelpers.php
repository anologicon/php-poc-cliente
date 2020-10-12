<?php

namespace Poc\Infrastructure\Database;

abstract class AbstractSqlHelpers
{
    public function createInsertQuery(array $columnsEntities, string $tablename): string
    {
        $querySting = "INSERT INTO ". $tablename;

        $startColumnsToInsert = " (";

        $querySting .= $startColumnsToInsert;

        $querySting .= implode(",", $columnsEntities);

        $endColumnsToInsert = ") ";

        $querySting .= $endColumnsToInsert;

        $querySting .= " VALUES (";

        $maxColumn = count($columnsEntities) - 1;

        while ($maxColumn > 0) {
            $querySting .= "?,";

            $maxColumn--;
        }
        
        $querySting .= "?)";

        return $querySting;
    }
}
