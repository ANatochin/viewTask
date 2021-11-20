<?php

namespace App\Models;

use App\Models\Common\MainModel;
use Lib\DB\Select;


class Post extends MainModel
{

    public function getPosts(array $filters =[]) : array
    {
        $select = $this->selected();
        $select->setTableNames('posts');
        if (!empty($filters)){
            $select->setWhereConditions('id = 14');
        }

//        $select->setWhereConditions('id = 14');

        $executeResult = $select->execute();
//        var_dump($executeResult);
        return $executeResult;
    }

}