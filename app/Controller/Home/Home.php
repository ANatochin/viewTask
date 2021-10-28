<?php

namespace App\Controller\Home;

use App\Controller\Controller;

class Home extends Controller
{
    public function index() {
        $this->generate('/home/home/index');
    }
}