<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;

class AdminController extends Controller
{

  public function dashboard()
  {

    $recent_data = array();
    $today_12_pm = (new DateTime('today midnight'))->modify('+1 day');
    $day_before = clone $today_12_pm;

    for ($i = 9; $i >= 0; $i--) {
      $day_before->modify('-1 day');
      $recent_data['tests'][$i] = Test::where([
        ['created_at', '>=', $day_before],
        ['created_at', '<', $today_12_pm]
      ])->count();
      $recent_data['results'][$i] = Resultat::where([
        ['created_at', '>=', $day_before],
        ['created_at', '<', $today_12_pm],
      ])->count();
      $today_12_pm = clone $day_before;
    }

    $results_notes  = array();
    $results_notes['Fails']  =  0;
    $results_notes['Okay']  =  0;
    $results_notes['Not bad']  =  0;
    $results_notes['Good']  =  0;
    $results_notes['Very Good']  =  0;
    $results_notes['Excellent']  =  0;

    $results = Resultat::all();
    foreach ($results as $result) {
      $n_quest = count($result->test->questions);
      $note = $result->score / $n_quest * 20;
      switch ($note) {
        case $note < 10:
          $results_notes['Fails']++;
          break;
        case $note < 12:
          $results_notes['Okay']++;
          break;
        case $note < 14:
          $results_notes['Not bad']++;
          break;
        case $note < 16:
          $results_notes['Good']++;
          break;
        case $note < 18:
          $results_notes['Very Good']++;
          break;
        case $note <= 20:
          $results_notes['Excellent']++;
          break;
      }
    }




    return view('pages.admin.dashboard', [
      'teacher_count' => User::where('user_type', 'teacher')->count(),
      'candidat_count' => User::where('user_type', 'candidat')->count(),
      'test_count' => User::count(),
      'result_count' => Resultat::count(),
      'recent_data' => $recent_data,
      'tests_with_results' => Test::whereHas('resultats')->count(),
      'tests_without_results' => Test::whereDoesntHave('resultats')->count(),
      'results_notes' => $results_notes

    ]);
  }

  public function user_management()
  {
    return view("pages.admin.user-management", [
      'users' => User::all()
    ]);
  }
}
