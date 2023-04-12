<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TeacherController extends Controller
{
  public function listTests()
  {
    $id  =  auth()->user()->id;
    return view("pages.teacher.mytests", ['tests' => Test::where('user_id', $id)->orderBy('created_at', 'desc')->get()]);
  }

  public function createTest()
  {
    return view('pages.teacher.create-test');
  }

  public function editTest($id)
  {
    return  view('pages.teacher.edit-test', ['test' => Test::findOrFail($id)]);
  }
}
