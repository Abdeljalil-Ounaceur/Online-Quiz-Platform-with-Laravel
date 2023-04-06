<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
   * Display all the static pages when authenticated
   *
   * @param string $page
   * @return \Illuminate\View\View
   */
  public function index(string $page)
  {
    if (view()->exists("pages.{$page}")) {
      return view("pages.{$page}");
    }

    return abort(404);
  }

  public function userManagement()
  {
    return view("pages.admin.user-management", [
      'users' => User::all()
    ]);
  }

  public function mytests()
  {
    $id  =  auth()->user()->id;
    return view("pages.teacher.mytests", ['tests' => Test::where('user_id', $id)->get()]);
  }

  public function tests()
  {
    return view("pages.candidat.tests", ['tests' => Test::all()]);
  }

  public function createTest()
  {
    return view('pages.teacher.create-test');
  }

  public function editTest($id)
  {
    return  view('pages.teacher.edit-test', ['test' => Test::findOrFail($id)]);
  }

  public function deleteTest($id)
  {
    Test::findOrFail($id)->delete();
    return back();
  }
}
