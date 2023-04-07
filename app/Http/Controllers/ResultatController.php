<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Resultat_Choix;
use App\Models\Test;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
  public function store(Request $request)
  {
    $test = Test::findOrFail($request->idTest);
    $questions = $test->questions;
    $choix = [];

    $keys = array_keys($request->all());
    $keys = array_values(preg_grep("/^radio_\d_/", $keys));

    $score =  0;


    $i = 0;
    foreach ($keys as $key) {
      $n_ans = intval(explode('_', $key)[2]);

      $choix[$i] = new Resultat_Choix();
      $choix[$i]->question = $i + 1;
      $choix[$i]->choix = $n_ans;

      if ($n_ans === 0)
        break;
      if ($questions[$i]->reponses[$n_ans - 1]->estCorrecte) {
        $score++;
      }
      $i++;
    }

    $result = new Resultat();
    $result->id_test = $test->id;
    $result->score = $score;
    $result->save();

    foreach ($choix as $choixCourant) {
      $choixCourant->id_resultat = $result->id;
      $choixCourant->save();
    }

    return 'success';
  }
}
