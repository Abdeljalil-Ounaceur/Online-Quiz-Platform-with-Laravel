<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'tag_test', 'test_id', 'tag_id');
    }

}


