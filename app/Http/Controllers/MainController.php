<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        echo 'about page';
    }

    public function apply()
    {
        echo 'apply page';
    }

    public function contacts()
    {
        echo 'contacts page';
    }

    public function search()
    {
        return view('search');
    }
}
