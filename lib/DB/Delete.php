<?php

namespace Lib\DB;

use Lib\DB\Common\Bridge;


class Delete extends Bridge
{
    private $tableName;
    private $whereConditions;

    public function setTableName($table)
    {
        $this->tableName = $table;
    }
    private function getTableName() : string
    {
        return $this->tableName;
    }

    public function setWhereConditions($conditions): void
    {
        $this->whereConditions = $conditions;
    }
    private function getWhereConditions()
    {
        return $this->whereConditions;
    }

    public function getSqlString() : string
    {
        $sqlDelete = 'DELETE FROM '.$this->getTableName();

        if(!empty($this->whereConditions)) {
            $where = new Where($this->getWhereConditions());
            $sqlDelete .= ' WHERE '.$where->getFinalWhereString();
        }
        return $sqlDelete;
    }

    public function execute()
    {
        $result = $this->selectFromDB();
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }
}