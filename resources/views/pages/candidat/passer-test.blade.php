@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Passer Test'])
      <div class="container-fluid py-4">
        <form method="POST" action="{{route('calculer-resultat')}}" >
          
          @csrf
          @method('POST')
          <input hidden name="idTest" id="idTest" value="{{$test->id}}" />
          <div class="col-12 mt-4 mx-auto">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{$test->titre}}</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <ul id="questions" class="list-group">
                  @php($i=1)
                  @foreach ($test->questions as $question)
                  <li id="question {{$i}}" class="list-group-item pb-4 mb-2" style="background-color: lightgray" >
                    <label for="question text {{$i}}">Question {{$i}}</label>
                    <input type="text" id="question text {{$i}}" class="form-control" name="question text {{$i}}" value='{{$question->text}} ?' disabled><br>
                    <label for="answerList {{$i}}">Answers</label>
                    <input hidden id="radio selected {{$i}}" name="radio {{$i}} 0" value="on"/>
                    <ol type="a" id="answerList {{$i}}">
                      @php($j = 1)
                      @foreach ($question->reponses as $reponse)
                      <li class="list-group-item" style="background-color: {{$j%2? "#dddddd" : "#eeeeee"}}">
                        <label for="answer {{$i}} {{$j}}">{{$j}}. </label>
                        <input type="radio" id="radio {{$i}} {{$j}}" class="mx-2" name="radio {{$i}}" onchange="changeSelectedRadioButton(this)">
                        <input type="text" id="answer {{$i}} {{$j}}" class="" name="answer {{$i}} {{$j}}" value='{{$reponse->text}}'" disabled>
                      </li>
                      @php($j++)
                      @endforeach
                    </ol>
                  </li>
                  @php($i++)
                  @endforeach
                </ul>
                <button class="btn btn-primary m-2" type="submit">Finish</button>
          </div>
          <script>
          function changeSelectedRadioButton(rb){
            buttonIndex = rb.id.substring(8);
            buttonQuestionIndex = rb.id.substring(6,7);
            console.log(rb.id);
            console.log(buttonQuestionIndex);
            console.log(buttonIndex);
            console.log("radio selected "+buttonQuestionIndex);
            input = document.getElementById("radio selected "+buttonQuestionIndex);
            input.name = "radio "+buttonQuestionIndex+" "+buttonIndex;
            console.log('input name :', input.name);
          }
          </script>
        </div>
      </div>
    </form>
    @include('layouts.footers.auth.footer')
  </div>
@endsection