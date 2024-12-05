<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Tag;
use App\Models\User;

class TeacherController extends Controller
{
  public function listTests()
  {
    $id  =  auth()->user()->id;
    $tags = Tag::all();
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

  public function filterTests(Request $request)
{
    $teacher = User::findOrFail($request->user()->id);

    $tag = $request->input('search');

    $filteredTests = $teacher->tests()->whereHas('tags', function ($query) use ($tag) {
        $query->where('name', $tag);
    })->orWhere('titre', 'like', '%' . $tag . '%')->orWhereHas('user', function ($query) use ($tag) {
        $query->where('username', $tag)->orWhere('firstname', $tag)->orWhere('lastname', $tag);
    })->get();


    return view('pages.teacher.mytests', compact('filteredTests'));
}
}
