<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index()
  {
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $test = new Test();
    $test->user_id = auth()->user()->id;
    $test->titre = $request->title;
    $test->description = $request->description;
    $test->save();


    $keys = array_keys($request->all());
    $questionKeys = array_values(preg_grep("/^question_/", $keys));

    $i = 1;
    foreach ($questionKeys as $quest_key) {
      $question = new Question();
      $question->test_id = $test->id;
      $question->text = $request[$quest_key];
      $question->save();


      $pattern = "/^answer_$i/";
      $currentAnswerKeys = array_values(preg_grep($pattern, $keys));
      $correct_answer = intval($request["radio_" . $i]);

      $j = 1;
      foreach ($currentAnswerKeys as $ans_key) {
        $answer = new Reponse();
        $answer->question_id = $question->id;
        $answer->text = $request[$ans_key];
        $answer->estCorrecte = ($j == $correct_answer);

        $answer->save();
        $j++;
      }
      $i++;
    }

    return redirect('/mytests')->with('success', 'Test Inserted successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Test  $test
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Test  $test
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Test  $test
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    Test::findOrFail($request['idTest'])->delete();
    return $this->store($request);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Test  $test
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Test::findOrFail($id)->delete();
    return back()->with('success', 'Test deleted successfullt');
  }
}
