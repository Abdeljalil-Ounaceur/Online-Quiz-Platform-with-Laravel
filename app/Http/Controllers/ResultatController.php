<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Resultat_Choix;
use App\Models\Test;
use Illuminate\Http\Request;

class ResultatController extends Controller
{

  public function index()
  {
    return view('pages.candidat.mes-resultats', [
      'resultats' =>
      Resultat::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get()
    ]);
  }

  public function show($id)
  {
    return view('pages.candidat.view-result', [
      'resultat' => Resultat::findOrFail($id)
    ]);
  }
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
    $result->id_user = auth()->user()->id;
    $result->id_test = $test->id;
    $result->score = $score;
    $result->save();

    foreach ($choix as $choixCourant) {
      $choixCourant->id_resultat = $result->id;
      $choixCourant->save();
    }

    return redirect('mes-resultats');
  }

  public function destroy($id)
  {
    Resultat::findOrFail($id)->delete();
    return redirect('mes-resultats');
  }
}
