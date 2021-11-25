<?php

namespace Lib\DB;

use Lib\DB\Common\Bridge;

class Insert extends Bridge
{
    private string $table;
    private $fields;
    private $values;


    public function setTable($table): void
    {
        $this->table = $table;
    }

    private function getTable(): string
    {
        return $this->table;
    }

    public function setFields($fields): void
    {
        $this->fields = $fields;
    }
    private function getFields()
    {
        return $this->stringBuilder($this->fields);
    }

    public function setValues($values): void
    {
        $this->values = $values;
    }
    private function getValues()
    {
        return $this->stringBuilder($this->values);
    }

    public function getSqlString() : string
    {
        $sqlSelect = 'INSERT INTO '.$this->getTable().'('.$this->getFields().')'.' VALUES '.'('.$this->getValues().')';


        return $sqlSelect;
    }

    private function stringBuilder($data)
    {
        $resultString = '';

        if(is_string($data)) {
            $resultString = $data;
        } elseif (is_array($data)) {
            foreach ($data as $value) {
                if(!empty($resultString)) {
                    $resultString .= ',';
                }
                $resultString .= ' ' . $value;

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