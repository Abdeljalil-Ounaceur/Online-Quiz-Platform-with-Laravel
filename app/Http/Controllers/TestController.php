<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Tag;

use App\Models\Question;
use App\Models\Reponse;
use App\Models\Test;
use Illuminate\Http\Request;
use Spatie\Tags\HasTags;


class TestController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index()
  {
    $tests = Test::all();
    return view('pages.candidat.tests',compact('tests')); //->with('tags', $tags)
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('view-quiz');
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

    if ($request->hasFile('file')) {
      $file = $request->file('file');
      $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5',
      ]);
      $imageName = time() . '.' . $request->file->extension();
      $test->image = $imageName;
      $file->move(public_path('test_images'), $imageName);
    }
    
    // $input = $request->all();
    // $tags = explode(",", $input['tags']);
    // $test = Test::create($input);
    // $test->tag($tags);

    $test->save();

    $tags = $request->tags;
    $tags = explode(",", $tags);
    if ($test) {
      if (is_array($tags)) {
          $tags_array = array_map('trim', $tags);
          // $tags_array = array_filter($tags_array);
  
          foreach ($tags_array as $tag) {
              $new_tag = Tag::firstOrCreate(['name' => $tag]);
              $test->tags()->attach($new_tag, ['test_id' => $test->id]);
          }
      }
  }

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

    return redirect('/mytests')->with('success', 'Test Inserted successfully')->with('tags',$tags);
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


  public function search(Request $request)
  {
    // $search = $request->get('search');
    // $tests = Test::where('titre', 'like', '%' . $search . '%')->paginate(5);
    // return view('pages.teacher.mytests', ['tests' => $tests]);

  //   $search = $request->input('search');
  //   // $tags = $request->input('tags');

  //   $tests = Test::query();

  //   if ($search) {
  //       $tests->where(function ($query) use ($search) {
  //           $query->where('name', 'like', '%'.$search.'%')
  //                 ->orWhere('description', 'like', '%'.$search.'%');
  //       });
  //   }

  //   // if ($tags) {
  //   //     $tests->whereHas('tags', function ($query) use ($tags) {
  //   //         $query->whereIn('id', $tags);
  //   //     });
  //   // }

  //   $tests = $tests->select('tests.*', DB::raw('count(*) as tag_count'))
  //                        ->groupBy('tests.id')
  //                        ->orderByRaw('tag_count desc')
  //                        ->get();

  //   return view('tests.index', compact('tests'));
  // }


  $query = $request->input('search');

    $testS = Test::where('name', 'like', '%'.$query.'%')
        ->orWhere('description', 'like', '%'.$query.'%')
        ->get();

    return view('pages.candidat.tests', compact('testS'));
}

}