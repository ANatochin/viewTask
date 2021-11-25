<?php

namespace App\Models;

class User
{
    public array $someUsers = [
        'people' => [
            ['name'=>'John', 'age'=>15, 'city'=>'NY', 'address'=>'some address info 1',],
            ['name'=>'Jack', 'age'=>16, 'city'=>'BAL', 'address'=>'some address info 2',],
            ['name'=>'Mike', 'age'=>17, 'city'=>'LA', 'address'=>'some address info 3',],
        ],

    ];


    public function getUser(): array
    {
            return $this->someUsers;
    }
}