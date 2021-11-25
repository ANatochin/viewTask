<?php

namespace App\Models;

use App\Models\Common\MainModel;
use Lib\DB\Select;


class Post extends MainModel
{

    public function getPosts(array $filters) : array
    {


        $select = $this->selected();
        $select->setTableNames('posts');
        if (!empty($filters)){
            $select->setWhereConditions(['subject'=>$filters['subject'], 'detail'=>$filters['detail'], 'author_id'=>$filters['Author_id']]);
        }
        $executeResult = $select->execute();
        return $executeResult;
    }

    public function updatePosts(array $filters) : array
    {

        $update = $this->update();
        $update->setTable('posts');

        $update->setWhereConditions('id = '.$filters['id']);
        unset($filters['id']);
        $update->setDataToUpdate($filters);
        $executeResult = $update->execute();
        return $executeResult;
    }

    public function getPost(int $id) : array
    {
        $select = $this->selected();
        $select->setTableNames('posts');
        $select->setWhereConditions('id = '.$id);

        $executeResult = $select->execute();
        $executeForUse = $executeResult[0];
        return($executeForUse);
    }

    public function createPost(array $filters) : array
    {

        $update = $this->create();
        $update->setTable('posts');
        $field = '';
        $val = '';
        foreach ($filters as $key => $value){
            $field.=', '.$key;
            $val.=', '.'\''.$value.'\'';
        }
        $field = trim($field, ' ,');
        $val = trim($val, ' ,');
        $update->setFields($field);
        $update->setValues($val);

        $executeResult = $update->execute();
        return $executeResult;
    }

    public function delete(array $filters)
    {
        $keys = array_keys($filters);
        $toDelete = $this->toDelete();
        $toDelete->setTableName('posts');
        $toDelete->setWhereConditions('id = '.$keys[0]);
        $executeResult = $toDelete->execute();
        return($executeResult);
    }

}