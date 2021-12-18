<?php


namespace App\Http\View\Composers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserDataComposer
{
    protected $user;

    public function __construct()
    {
        $this->user = User::with(['profile'])->find(Auth::id());
    }

    public function compose(View $view)
    {
        $user_data = [
            'profile_id' => null,
        ];

        if (!empty($this->user)) {
            $profile = $this->user->profile;
        }

        if (!empty($profile)) {
            $user_data['profile_id'] = $profile->id;
        }

        $view->with('user_data', $user_data);
    }
}