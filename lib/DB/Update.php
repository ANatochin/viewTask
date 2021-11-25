<?php

namespace Lib\DB;

use Lib\DB\Common\Bridge;

class Update extends Bridge
{
    private string $table;
    private $dataToUpdate;
    private $whereConditions;


    public function setTable($tableName)
    {
        $this->table = $tableName;
    }

    private function getTableName() : string
    {
        return $this->table;
    }

    public function setDataToUpdate($details) : void
    {
        $this->dataToUpdate= $details;
    }
    public function getDataToUpdate()
    {
        return $this->stringBuilder($this->dataToUpdate);
    }

    public function setWhereConditions ($conditions): void
    {
        $this->whereConditions = $conditions;
    }
    private function getWhereConditions()
    {
        return $this->whereConditions;
    }

    public function getSqlString()
    {
        $sqlUpdate = 'UPDATE '.$this->getTableName();

        if(!empty($this->dataToUpdate)) {
            $sqlUpdate.= ' SET '.$this->getDataToUpdate();
        }

        if(!empty($this->whereConditions)) {
            $where = new Where($this->getWhereConditions());
            $sqlUpdate .= ' WHERE '.$where->getFinalWhereString();
        }

        return $sqlUpdate;
    }

    private function stringBuilder($data)
    {
        $resultString = '';

        if(is_string($data)) {
            $resultString = $data;
        } elseif (is_array($data)) {
            foreach ($data as $key => $value) {
                if(!empty($resultString)) {
                    $resultString .= ', ';
                }
                if(is_array($value)) {
                    foreach ($value as $internalKey => $internalValue) {
                        $resultString .= $internalKey. ' = \'' . $internalValue. '\'';
                    }
                } elseif (is_int($key)) {
                    $resultString .= $value;
                } elseif (is_string($key)) {
                    $resultString .= $key. ' = \'' . $value.'\'';
                }
            }
        }
        return $resultString;
    }

    public function execute()
    {
        $result = $this->selectFromDB();
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }
}