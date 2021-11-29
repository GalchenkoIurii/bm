<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function apply()
    {
        echo 'apply page';
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function search()
    {
        $categories = Category::with('services')->get();

        return view('search', compact('categories'));
    }
}
