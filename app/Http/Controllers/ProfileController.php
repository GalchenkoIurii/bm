<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

            $user_data = null;
            $category_id = null;
            $service_ids = null;

            if ($request->hasFile('avatar')) {
                $folder = date('Y-m-d');
                $request_data['avatar'] = $request->file('avatar')->store('profiles/' . $folder, 'public');
                $old_avatar_path = $profile->avatar;
            }

            if ($request_data['first_name']) {
                $user_data['first_name'] = $request_data['first_name'];
                unset($request_data['first_name']);
            }

            if ($request_data['last_name']) {
                $user_data['last_name'] = $request_data['last_name'];
                unset($request_data['last_name']);
            }

            if ($request_data['email'] && $request_data['email'] !== $profile->user->email) {
                $user_data['email'] = $request_data['email'];
                unset($request_data['email']);
            } else {
                unset($request_data['email']);
            }

            if ($request_data['phone'] && $request_data['phone'] !== $profile->user->phone) {
                $user_data['phone'] = $request_data['phone'];
                unset($request_data['phone']);
            } else {
                unset($request_data['phone']);
            }

            if ($request_data['category_id']) {
                $category_id = $request_data['category_id'];
                unset($request_data['category_id']);
            }

            if ($request_data['service_ids']) {
                $service_ids = $request_data['service_ids'];
                unset($request_data['service_ids']);
            }

            if ($user_data) {
                $profile->user->update($user_data);
            }

            $profile->update($request_data);

            if ($category_id) {
                $profile->user->categories()->sync($category_id);
            }

            if ($service_ids) {
                $profile->user->services()->sync($service_ids);
            }

            if (isset($old_avatar_path)) {
                Storage::disk('public')->delete($old_avatar_path);
            }

            return redirect()->route('profiles.show', ['profile' => $id])->with('success', 'Данные профиля обновлены');
        }

        return back()->with('error', 'Недостаточно прав для редактирования');
    }

    public function getServices(Request $request)
    {
        $services = Service::where('category_id', $request->input('category_id'))->get();

        return response()->json($services->toArray());
    }
}
