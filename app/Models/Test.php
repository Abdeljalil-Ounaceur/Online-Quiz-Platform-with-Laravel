<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
  use HasFactory;

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function questions()
  {
    return $this->hasMany(Question::class, 'test_id');
  }
}
