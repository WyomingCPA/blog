<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'text', 'preview', 'status'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function sources()
    {
      return $this->hasMany(Source::class);
    }

    public function photo()
    {
      return $this->hasOne(Photo::class);
    }
}
