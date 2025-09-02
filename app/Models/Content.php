<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'title',
        'description',
        'view_count',
        'video_duration_seconds',
        'video_thumbnail_url',
        'video_thumbnail_previews_url',
        'video_embed_url'
    ];

    protected $casts = [
        'video_thumbnail_previews_url' => 'array',
    ];

    public function cooks()
    {
        return $this->belongsToMany(Cook::class, 'content_cook');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'content_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'content_tag');
    }
}
