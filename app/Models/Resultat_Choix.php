<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat_Choix extends Model
{
  use HasFactory;

  protected $table = 'resultat_choix';

  protected $fillable = [
    'id_resultat',
    'question',
    'choix'
  ];
}
