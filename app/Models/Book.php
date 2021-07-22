<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function scopeIsArchived($query)
    {
        return $query->where('is_archived', 0);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
