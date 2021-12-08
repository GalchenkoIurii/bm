<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::with(['user'])->findOrFail($id);

        return view('profiles.profiles-show', compact('profile'));
    }
}
