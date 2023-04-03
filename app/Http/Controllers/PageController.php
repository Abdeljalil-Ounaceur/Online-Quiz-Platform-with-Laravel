<?php

namespace App\Http\Controllers;

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

  public function tables()
  {
    return view("pages.teacher.tables");
  }

  public function billing()
  {
    return view("pages.candidat.billing");
  }
}
