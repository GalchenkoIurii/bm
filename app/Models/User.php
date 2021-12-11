<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'phone',
        'password',
        'first_name',
        'last_name',
        'gender',
        'country',
        'region',
        'district',
        'city',
        'street',
        'house',
        'locale_num',
        'ip_address',
        'coord_lat',
        'coord_long',
        'is_master'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function isOnline()
    {
        return Cache::has('user_online_' . $this->id);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
