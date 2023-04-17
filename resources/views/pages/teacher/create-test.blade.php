@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
      <div class="container-fluid py-4">
        <form method="POST" action="{{route('save-test')}}" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="col-12 mt-4 mx-auto">
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">New Test</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <div class = "mb-5">
                  <label for="title">Title</label>
                  <input type="text" id="title" class="form-control" name="title"/>
                  <label for="description">Description</label>
                  <textarea type="text" id="description" rows="4" class="form-control" name="description"></textarea>
                  <label for="image">Upload test image</label>
                  <input type="file" name="file" id="file" class="form-control">
                </div>
                <ul id="questions" class="list-group">
                  <li id="question 1" class="list-group-item pb-4 mb-2" style="background-color: lightgray" >
                    <label for="question text 1">Question 1</label>
                    <input type="text" id="question text 1" class="form-control" name="question text 1"><br>
                    <label for="answerList 1">Answers</label>
                      <input hidden id="radio selected 1" name="radio 1 1" value="on"/>
                      <ol type="a" id="answerList 1">
                        <li class="list-group-item" style="background-color: #dddddd">
                            <label for="answer 1 1">1. </label>
                            <input type="radio" id="radio 1 1" class="mx-2" name="radio 1" checked onchange="changeSelectedRadioButton(this)">
                            <input type="text" id="answer 1 1" class="" name="answer 1 1">
                            <button class="mx-3" type="button" onclick="addAnswer(this)">+</button>
                        </li>
                      </ol>
                  </li>
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