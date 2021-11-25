<?php

namespace App\Controller\Home;

use App\Controller\Controller;

class About extends Controller
{
    public function index()
    {

        $this->generate('/home/contact/index');

    }

}