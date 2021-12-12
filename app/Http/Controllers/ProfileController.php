<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::with(['user'])->findOrFail($id);

        return view('profiles.profiles-show', compact('profile'));
    }

    public function edit($id)
    {
        if (Auth::user()->profile->id == $id) {
            $profile = Profile::with(['user'])->findOrFail($id);

            return view('profiles.profiles-edit', compact('profile'));
        }

        return back()->with('error', 'Недостаточно прав для редактирования');
    }
}
