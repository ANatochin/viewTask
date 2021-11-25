<?php

namespace Lib\DB\Common;

use PDO;

class Connector
{
    protected $connect;

    public function __construct()
    {
        $config = include 'app/config/database.php';
        $dns = $config['driver'].':host='.$config['host'].':'.$config['port'].';dbname='.$config['db_name'];
        $this->connect = new PDO($dns, $config['user'],$config['pass']);

    }


    public function getConnect(): PDO
    {
        return $this->connect;
    }

}