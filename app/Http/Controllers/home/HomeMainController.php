<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;

class HomeMainController extends Controller
{
    public function index()
    {
        return view('home.user');
    }
}
