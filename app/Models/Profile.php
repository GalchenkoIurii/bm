<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('storage/no-avatar.svg');
        } else {
            return asset('storage/' . $this->avatar);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
