<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $fillable = [
        'name',
        'category_thumbnail_url'
    ];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_category');
    }

    // Define os campos pesquisáveis
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    // Suporte a soft-deletes no Scout
    public function searchableAs()
    {
        return 'categories_index';
    }
}