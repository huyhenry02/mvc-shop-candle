<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(): string
    {
        return view('user.layouts.index');
    }
}
