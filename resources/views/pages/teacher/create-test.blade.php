@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
      <div class="container-fluid py-4">
        <div class="col-12 mt-4 mx-auto">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">New Test</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <form>
                <ul id="questions" class="list-group">
                  <li id="question 1" class="list-group-item">
                    <label for="question text 1">Question 1</label>
                    <input type="text" id="question text 1" class="form-control" name="question text 1"><br>
                    <label for="answerList 1">Answers</label>
                      <ol type="a" id="answerList 1">
                        <li class="list-group-item">
                            <label for="answer 1 1">1. </label>
                            <input type="radio" id="answer 1 1" class="" name="answerList 1">
                            <input type="text" id="answer 1 1" class="" name="answer 1 1">
                            <button class = "" type="button" onclick="addAnswer(this)">+</button>
                        </li>
                      </ol>
                  </li>
                </ul>
              </form>
              <script>
              function addAnswer(btn) {
                console.log(btn);
                let li = document.createElement("li");
                let answerList = btn.parentElement.parentElement;
                let n_quest = answerList.id.split(" ")[1];
                let n_ans = answerList.childElementCount+1;
                let id_ans = "answer "+n_quest+" "+n_ans;
                li.innerHTML = ""+
                    "<label for='"+id_ans+"'>"+n_ans+". </label>"+
                    "<input type='text' id='"+id_ans+"' class='mx-1' name='"+id_ans+"'>"+
                    "<button class = '' type='button' onclick='addAnswer(this)''>+</button><br>"
                  "";
                li.className = "list-group-item";
                answerList.appendChild(li);
                console.log(btn.id);
                btn.parentElement.removeChild(btn);
              }

              function addQuestion(btn) {
                console.log(btn);
                let li = document.createElement("li");
                let questionList = getElementById("questions");  
              }
              </script>
          </div>
        </div>
      </div>
      <footer class="footer pt-3">
          <div class="card">
            <div class="card-body pb-0">
              <button class="btn btn-outline-success px-3 mb-0" onclick="javascript:;">Add Quetion</button>
              <div class="ms-auto text-end" style="float:right">
                <button class="btn btn-primary" type="submit">Finish</button>
              </div>
            </div>
        </div>
      </footer>
    @include('layouts.footers.auth.footer')
  </div>
@endsection