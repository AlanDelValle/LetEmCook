<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cook extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'cook_thumbnail_url'
];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_cook');
    }
}