<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
