<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Helpers\GlobalFilters;
use App\Models\Post as PostModel;

class Post extends Controller
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $this->generate('/admin/post/index', $this->postModel->getPosts(GlobalFilters::postFilter()));
    }

    public function create()
    {
        var_dump(GlobalFilters::postFilter());
        $this->generate('/admin/post/create', $this->postModel->createPost(GlobalFilters::postFilter()));
    }

    public function update()
    {
        if(!empty(GlobalFilters::postFilter())) {
            $this->postModel->updatePosts(GlobalFilters::postFilter());
        }
        $this->generate('/admin/post/update', $this->postModel->getPost($_GET['id']));
    }

    public function delete()
    {
       $this->generate('/admin/post/delete', $this->postModel->delete($_GET));
    }



}