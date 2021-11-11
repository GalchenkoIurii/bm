<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(UserRegisterRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);
        $request_data['password'] = Hash::make($request_data['password']);

        $request_data['ip_address'] = $_SERVER['REMOTE_ADDR'];

        $user = User::create($request_data);

        session()->flash('success', 'Вы успешно зарегистрированы');

        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(UserLoginRequest $request)
    {
        $request_data = array_diff($request->validated(), [null]);

        $search_param = array_key_exists('email', $request_data) ? 'email' : 'phone';

        $user = User::where($search_param, $request_data[$search_param])->first();

        if (isset($user) && $user->is_banned) {
            return redirect()->back()->with('error', 'Вы заблокированы');
        }

        if (Auth::attempt($request_data)) {
            $request->session()->regenerate();

            session()->flash('success', 'Вы вошли');

            return redirect()->intended(route('home'));
        }

        return redirect()->back()->with('error', 'Неверные данные для входа');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
