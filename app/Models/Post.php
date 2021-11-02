<?php

namespace App\Models;

class Post
{
    public array $somePost = [
        'post' =>[
            ['name'=>'John', 'text'=> 'some text'],
            ['name'=>'Jack', 'text'=> 'some text'],
            ['name'=>'Mike', 'text'=> 'some text'],
        ],
    ];

    public function getPost(): array
    {
        return $this->somePost;
    }

}