<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'post_category_id',
        'image',
        'confirmed',
        'need_confirmation',
        'user_id'
    ];

    public function getImage()
    {
        if (!$this->image) {
            return asset('storage/no-image.svg');
        } else {
            return asset('storage/' . $this->image);
        }
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function postTags()
    {
        return $this->belongsToMany(PostTag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
