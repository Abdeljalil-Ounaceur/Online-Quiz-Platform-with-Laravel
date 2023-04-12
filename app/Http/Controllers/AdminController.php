<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
  public function userManagement()
  {
    return view("pages.admin.user-management", [
      'users' => User::all()
    ]);
  }
}
