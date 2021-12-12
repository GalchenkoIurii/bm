<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

        if (isset($request_data['is_master'])) {
            $request_data['is_master'] = 1;
        }

        $request_data['ip_address'] = $_SERVER['REMOTE_ADDR'];

        $user = User::create($request_data);

        $user->profile()->save(new Profile());

        session()->flash('success', 'Вы успешно зарегистрированы');

        Auth::login($user);

        return redirect()->route('profiles.show', ['profile' => Auth::user()->profile->id]);
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

    public function passwordRequest()
    {
        return view('reset-password.forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? view('reset-password.link-sent')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset($token)
    {
        return view('reset-password.reset-password', ['token' => $token]);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
