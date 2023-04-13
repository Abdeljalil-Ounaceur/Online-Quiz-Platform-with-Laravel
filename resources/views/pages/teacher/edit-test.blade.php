@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
<div class="container-fluid py-4">
  <form method="POST" action="{{route('update-test')}}">

    <input hidden name="idTest" id="idTest" value="{{$test->id}}" />
    @csrf
    @method('POST')
    <div class="col-12 mt-4 mx-auto">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">New Test</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <div class="mb-5">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title" value="{{$test->titre}}" />
            <label for="description">Description</label>
            <textarea type="text" id="description" rows="4" class="form-control"
              name="description">{{$test->description}}</textarea>
          </div>
          <ul id="questions" class="list-group">
            @php($i=1)
            @foreach ($test->questions as $question)
            <li id="question {{$i}}" class="list-group-item pb-4 mb-2" style="background-color: lightgray">
              <label for="question text {{$i}}">Question {{$i}}</label>
              <input type="text" id="question text {{$i}}" class="form-control" name="question text {{$i}}"
                value='{{$question->text}}'><br>
              <label for="answerList {{$i}}">Answers</label>
              <ol type="a" id="answerList {{$i}}">
                @php($j = 1)
                @foreach ($question->reponses as $reponse)
                <li class="list-group-item" style="background-color: #dddddd">
                  <label for="answer {{$i}} {{$j}}">{{$j}}. </label>
                  <input type="radio" id="radio {{$i}} {{$j}}" class="mx-2" name="radio {{$i}}" value="{{$j}}"
                    {{$reponse->estCorrecte ? 'checked' : ''}}>
                  <input type="text" id="answer {{$i}} {{$j}}" class="" name="answer {{$i}} {{$j}}"
                    value='{{$reponse->text}}'">
                        @if ($loop->last)
                            <button class=" mx-3" type="button" onclick="addAnswer(this)">+</button>
                  @endif
                </li>
                @php($j++)
                @endforeach
              </ol>
            </li>
            @php($i++)
            @endforeach
          </ul>
          @include('javascript-help.addToTest')
        </div>
      </div>
    </div>
    @include('components.test-footer')
  </form>
  @include('layouts.footers.auth.footer')
</div>
@endsection