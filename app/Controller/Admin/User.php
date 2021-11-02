<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Models\User as UserModel;

class User extends Controller
{

    public function index()
    {
        $userListOne = new UserModel();
        $data = $userListOne->getUser();
        $this->generate('/admin/user/index', $data);
    }


}