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
    if (view()->exists("pages.admin.{$page}")) {
      return view("pages.{$page}");
    }
    if (view()->exists("pages.candidat.{$page}")) {
      return view("pages.{$page}");
    }
    if (view()->exists("pages.teacher.{$page}")) {
      return view("pages.{$page}");
    }

    return abort(404);
  }
}
