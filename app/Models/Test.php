<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'titre',
    'description',
    'image'
  ];

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function questions()
  {
    return $this->hasMany(Question::class, 'test_id');
  }

  public function tags()
  {
      return $this->belongsToMany(Tag::class, 'tag_test', 'test_id', 'tag_id');
  }

  public function resultats()
  {
    return $this->hasMany(Resultat::class, 'id_test');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
