<?php

namespace Lib\DB\Common;

abstract class Bridge
{
    protected $conn;

    public function __construct(){
        $connectorObj = new Connector();
        $this->conn = $connectorObj->getConnect();
    }

    public function selectFromDB()
    {
        $stmt = $this->conn->prepare($this->getSqlString());
        $stmt->execute();
        return $stmt;
    }

    public abstract function getSqlString();
}