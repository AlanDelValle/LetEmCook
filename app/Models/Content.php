<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Content extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $fillable = [
        'title',
        'description',
        'difficulty',
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

    /**
     * Define os campos que serão indexados pelo Scout.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'difficulty' => $this->difficulty,
        ];
    }

    /**
     * Define o nome do índice para o Scout.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'contents_index';
    }
}