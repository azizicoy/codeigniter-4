<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        return view('home');
    }
}