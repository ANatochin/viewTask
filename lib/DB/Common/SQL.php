<?php

namespace Lib\DB\Common;

use Lib\DB\Select;

class SQL
{
    public function selected()
    {
        return new Select();
    }


}