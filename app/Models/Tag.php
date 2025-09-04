<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $fillable = [
        'name',
        'tag_thumbnail_url'
    ];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_tag');
    }

    /**
     * Define os campos que serão indexados pelo Scout.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    /**
     * Define o nome do índice para o Scout.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'tags_index';
    }
}