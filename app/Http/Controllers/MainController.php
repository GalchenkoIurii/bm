<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
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

//    public function apply()
//    {
//        echo 'apply page';
//    }

    public function contacts()
    {
        return view('contacts');
    }

    public function search()
    {
        $categories = Category::with('services')->get();

        return view('search', compact('categories'));
    }

    public function searchMasters($service)
    {
        $users = User::with('profile')->whereRelation('services', 'slug', $service)->paginate(1);

        return view('masters.masters-show', compact('users'));
    }
}
