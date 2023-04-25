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

    $tests_notes  = array_fill(0, 6, 0);

    $tests = Test::all();
    foreach ($tests as $test) {
      $note = 0;
      $n_notes = 0;
      $n_quest = count($test->questions);
      foreach ($test->resultats as $result) {
        $note += $result->score / $n_quest * 20;
        $n_notes++;
      }
      if (!$n_notes) {
        continue;
      }
      $note = $note / $n_notes;

      switch ($note) {
        case $note < 10:
          $tests_notes[0]++;
          break;
        case $note < 12:
          $tests_notes[1]++;
          break;
        case $note < 14:
          $tests_notes[2]++;
          break;
        case $note < 16:
          $tests_notes[3]++;
          break;
        case $note < 18:
          $tests_notes[4]++;
          break;
        case $note <= 20:
          $tests_notes[5]++;
          break;
      }
    }




    return view('pages.admin.dashboard', [
      'teacher_count' => User::where('user_type', 'teacher')->count(),
      'candidat_count' => User::where('user_type', 'candidat')->count(),
      'test_count' => Test::count(),
      'result_count' => Resultat::count(),
      'recent_data' => $recent_data,
      'tests_with_results' => Test::whereHas('resultats')->count(),
      'tests_without_results' => Test::whereDoesntHave('resultats')->count(),
      'tests_notes' => $tests_notes

    ]);
  }

  public function user_management()
  {
    return view("pages.admin.user-management", [
      'users' => User::all()
    ]);
  }
}
