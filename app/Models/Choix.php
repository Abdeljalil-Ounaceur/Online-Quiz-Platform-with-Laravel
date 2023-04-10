<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
  use HasFactory;

  protected $table = 'choix';

  protected $fillable = [
    'id_resultat',
    'question',
    'choix'
  ];
}
