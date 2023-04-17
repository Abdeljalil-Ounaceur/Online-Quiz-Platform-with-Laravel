<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
  use HasFactory;

  protected $fillable = [
    'question_id',
    'text',
    'estCorrecte'
  ];

  public function question()
  {
    return $this->belongsTo(Question::class, 'question_id');
  }
}
