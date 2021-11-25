<?php

namespace App\Models\Common;

use Lib\DB\Common\SQL;

class MainModel
{
    protected $sql;

    public function __construct()
    {
        $this->sql = new SQL();
    }


    public function selected()
    {
        return $this->sql->selected();
    }
    public function update()
    {
        return $this->sql->update();
    }
    public function create()
    {
        return $this->sql->create();
    }
    public function toDelete()
    {
        return $this->sql->delete();
    }

}