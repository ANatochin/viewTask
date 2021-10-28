<?php

namespace App\Controller\Home;

use App\Controller\Controller;

class OneMore extends Controller
{
    public function oneMore(){
        $this->generate('/home/onemore/onemore');
    }

}