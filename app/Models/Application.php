<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'service_id',
        'start_price',
        'end_price',
        'photo',
        'start_date',
        'end_date',
        'place',
        'country',
        'region',
        'district',
        'city',
        'street',
        'house',
        'locale_num',
        'coord_lat',
        'coord_long',
        'name',
        'phone',
        'email',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
