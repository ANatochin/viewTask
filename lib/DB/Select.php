<?php

namespace Lib\DB;

use Exception;
use Lib\DB\Common\Bridge;
use Lib\DB\Where;

class Select extends Bridge
{
    private $tableNames;
    private $fieldNames='*';
    private $orderedBy;
    private $order;
    private int $limited = 0;
    private int $offset = 0;
    private $whereConditions;


    public function setTableNames($tableNames):void
    {
        $this->tableNames = $tableNames;
    }

    private function getTableNames()
    {
        return $this->stringBuilder($this->tableNames);
    }

    public function setFieldNames($fieldNames): void
    {
        $this->fieldNames = $fieldNames;
    }
    private function getFieldNames()
    {
        return $this->stringBuilder($this->fieldNames);
    }

    public function setOrderedBy($orderField)
    {
        $this->orderedBy = $orderField;
    }
    private function getOrderedBy()
    {
        return $this->stringBuilder($this->orderedBy);
    }

    public function setOrder($order): void
    {
        $this->order = $order;
    }
    private function getOrder()
    {
        $orderArr = ['DESC', 'ASC'];
        if(!array_search($this->order, $orderArr)) {
            throw new Exception('Error, order should be DESC, ASC or left it empty');
        } else {
            return $this->stringBuilder($this->order, true);
        }
    }

    public function setLimited(int $limited): void
    {
        $this->limited = $limited;
    }
    private function getLimited()
    {
        return $this->limited;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }
    private function getOffset()
    {
        return $this->offset;
    }

    public function setWhereConditions($whereConditions): void
    {
        $this->whereConditions = $whereConditions;
    }
    private function getWhereConditions()
    {
        return $this->whereConditions;
    }



    public function getSqlString() : string
    {
        $sqlSelect = 'SELECT '.$this->getFieldNames().' FROM '.$this->getTableNames();

        if (!empty($this->orderedBy)) {
            $sqlSelect .= ' ORDER BY '.$this->getOrderedBy();
            if (!empty($this->order)) {
                $sqlSelect .= ' '.$this->getOrder();
            }
        }

        if (!empty($this->limited)){
            $sqlSelect .= ' LIMIT '.$this->getLimited();
            if(!empty($this->offset)){
                $sqlSelect .= ', '.$this->getOffset();
            }
        }

        if(!empty($this->whereConditions)) {
            $where = new Where($this->getWhereConditions());
            $sqlSelect .= ' WHERE '.$where->getFinalWhereString();
        }


        return $sqlSelect;
    }

    private function stringBuilder($data, $orderString=false)
    {
        $resultString = '';

        if(is_string($data)) {
            $resultString = $data;
        } elseif (is_array($data)) {
            foreach ($data as $key => $value) {
                if(!empty($resultString)) {
                    $resultString .= ',';
                }
                if(is_int($key)) {
                    $resultString .= $value;
                } elseif (is_string($key)) {
                    if (!$orderString) {
                        $resultString .= $value . ' AS ' . $key;
                    } else {
                        $resultString .= $key . ' ' . $value;
                    }
                } else {
                    throw new Exception('Error, input correct parameters');
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