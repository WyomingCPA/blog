<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'name', 'source', 'description'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
