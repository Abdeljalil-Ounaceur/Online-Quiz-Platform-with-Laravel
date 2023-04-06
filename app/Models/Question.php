<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  use HasFactory;


  protected $fillable = [
    'test_id',
    'text',
  ];

  public function test()
  {
    return $this->belongsTo(Test::class, 'test_id');
  }

  public function reponses()
  {
    return $this->hasMany(Reponse::class, 'question_id');
  }
}
