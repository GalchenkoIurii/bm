<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Service;
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
            $categories = Category::all();

            return view('profiles.profiles-edit', compact('profile', 'categories'));
        }

        return back()->with('error', 'Недостаточно прав для редактирования');
    }

    public function update(ProfileEditRequest $request, $id)
    {
        $request_data = $request->validated();

        if (Auth::user()->profile->id == $id) {
            $profile = Profile::with(['user'])->findOrFail($id);

            $profile_data = null;
            $user_data = null;

            if ($request->hasFile('avatar')) {
                $folder = date('Y-m-d');
                $profile_data['avatar'] = $request->file('avatar')->store('profiles/' . $folder, 'public');
                $old_avatar_path = $profile->avatar;
            }
        }

        return back()->with('error', 'Недостаточно прав для редактирования');
    }

    public function getServices(Request $request)
    {
        $services = Service::where('category_id', $request->input('category_id'))->get();

        return response()->json($services->toArray());
    }
}
