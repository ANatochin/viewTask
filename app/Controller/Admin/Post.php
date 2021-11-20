<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Helpers\GlobalFilters;
use App\Models\Post as PostModel;

class Post extends Controller
{
    public function index()
    {

        $postModel = new PostModel();
        //$data = $postModel ->getPosts(GlobalFilters::postFilter());
        $this->generate('/admin/post/index', $postModel ->getPosts(GlobalFilters::postFilter()));
    }

}