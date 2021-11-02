<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Models\Post as PostModel;

class Post extends Controller
{
    public function index()
    {
        $userListOne = new PostModel();
        $data = $userListOne->getPost();
        $this->generate('/admin/post/index', $data);
    }

}