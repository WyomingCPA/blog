<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'text', 'preview', 'status', 'reading_time'];
  protected $appends = ['words', 'difference_point', 'total_sources'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function sources()
  {
    return $this->hasMany(Source::class);
  }

  public function getTotalSourcesAttribute()
  {
    return $this->relationLoaded('sources') ? $this->sources->count() : $this->sources()->count();
  }

  public function photo()
  {
    return $this->hasOne(Photo::class);
  }

  public function getWordsAttribute()
  {
    $model = Word::where('post_id', '=', $this->id)->orderBy('created_at', 'desc')->first();
    if (isset($model)) {
      return $model->count_word;
    }
    return 0;
  }
  public function getUpdatedAtAttribute($value)
  {
    return Carbon::parse($value)->format('H:i:s j F Y');
  }
  //Список участников на разный промежуток времени
  public function getDifferencePointAttribute()
  {
    $last_count = Word::where('post_id', '=', $this->id)->orderBy('created_at', 'desc')->skip(0)->take(2)->get()->first()->count_word ?? 0;
    $previous_count = Word::where('post_id', '=', $this->id)->orderBy('created_at', 'desc')->skip(1)->take(2)->get()->first()->count_word ?? 0;
    $count = $last_count - $previous_count;
    return $count;
  }
}
