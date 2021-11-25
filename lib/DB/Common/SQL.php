<?php

namespace Lib\DB\Common;

use Lib\DB\Delete;
use Lib\DB\Insert;
use Lib\DB\Select;
use Lib\DB\Update;

class SQL
{
    public function selected()
    {
        return new Select();
    }

    public function update()
    {
        return new Update();
    }

    public function create()
    {
        return new Insert();
    }

    public function delete()
    {
        return new Delete();
    }


}