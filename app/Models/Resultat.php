<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
  use HasFactory;

  protected $fillable = [
    'id_user',
    'id_test',
    'score'
  ];

  public function test()
  {
    return $this->belongsTo(Test::class, 'id_test');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }
  public function choix()
  {
    return $this->hasMany(Choix::class, 'id_resultat');
  }
}
