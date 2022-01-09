<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'accepted',
        'application_id'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
