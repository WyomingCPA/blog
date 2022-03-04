<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'text', 'preview', 'status', 'reading_time'];

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

    public function getWordsAttribute()
    {
        $model = Word::where('post_id', '=', $this->id)->orderBy('created_at', 'desc')->first();
        if (isset($model))
        {
          return $model->count_word;
        }
        return 0;    
    }
}
