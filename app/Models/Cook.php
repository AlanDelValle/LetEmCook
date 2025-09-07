<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use App\Models\User;

class Cook extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $fillable = [
        'name',
        'cook_description',
        'bio',
        'cook_thumbnail_url'
    ];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_cook');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'cook_user', 'cook_id', 'user_id')->withTimestamps();
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
            'bio' => $this->bio,
        ];
    }

    /**
     * Define o nome do índice para o Scout.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'cooks_index';
    }
}