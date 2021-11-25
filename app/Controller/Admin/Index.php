<?php

namespace App\Controller\Admin;

use App\Controller\Controller;

class Index extends Controller
{
    public function index(){
        $this->generate('/admin/index/index');
    }

}