<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

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
}
