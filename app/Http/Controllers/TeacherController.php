<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Tag;

class TeacherController extends Controller
{
  public function listTests()
  {
    $id  =  auth()->user()->id;
    $tags = Tag::all();
    return view("pages.teacher.mytests", ['tests' => Test::where('user_id', $id)->orderBy('created_at', 'desc')->get()])->with('tags', $tags);
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
