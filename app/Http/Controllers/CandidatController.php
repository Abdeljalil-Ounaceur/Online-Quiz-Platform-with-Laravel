<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Tag;

class CandidatController extends Controller
{
  public function listTests()
  {
    return view("pages.candidat.tests", ['tests' => Test::orderBy('created_at', 'desc')->get()]);
  }

  public function passTest($id)
  {
    return view("pages.candidat.passer-test", ['test' => Test::findOrFail($id)]);
  }

  public function filterTest(Request $request){

    $tag = $request->input('search');

    $filteredTests = Test::whereHas('tags', function ($query) use ($tag) {
        $query->where('name', $tag);
    })->orWhere('titre', 'like', '%' . $tag . '%')->orWhereHas('user', function ($query) use ($tag) {
        $query->where('username', $tag)->orWhere('firstname', $tag)->orWhere('lastname', $tag);
    })->get();

    return view('pages.candidat.tests', compact('filteredTests'));
  }
}
