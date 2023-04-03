<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    return match (auth()->user()->user_type) {
      'admin' => redirect('/user-management'),
      'candidat' => redirect('/billing'),
      'teacher' => redirect('/tables'),
    };
  }
}
