<?php

namespace App\Controller\Home;

use App\Controller\Controller;
use App\Models\User as UserModel;

class Contact extends Controller
{
    public function index()
    {

//        $this->generate('/home/contact/index');

        $userListTwo = new UserModel();
        $data = $userListTwo->getAddresses();
        $this->generate('/home/contact/index', $data);

    }


}