<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Tag;

class CandidatController extends Controller
{
  public function listTests()
  {
    $tags = Tag::all()->pluck('name');
    return view("pages.candidat.tests", ['tests' => Test::orderBy('created_at', 'desc')->get()])->with('tags', $tags);
  }

  public function passTest($id)
  {
    return view("pages.candidat.passer-test", ['test' => Test::findOrFail($id)]);
  }
}
