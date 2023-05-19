@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.candidat.topnav', ['title' => 'Passer Test'])
<style>
  input[type="radio"]:disabled {
    background-color: -internal-light-dark(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1));
  }
</style>
<div class="container-fluid py-4">
  <form method="GET" action="{{route('mes-resultats')}}">
    {{$test = $resultat->test}}

    @csrf
    @method('GET')
    <div class="col-12 mt-4 mx-auto">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">{{$test->titre}}</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <ul id="questions" class="list-group">
            @php($i=1)
            @foreach ($test->questions as $question)
            <li class="list-group-item pb-4 mb-2">
              <label>Question {{$i}}</label>
              <input type="text" class="form-control" value='{{$question->text}} ?' disabled><br>
              <label>Answers</label>
              <ol type="a" id="answerList {{$i}}">
                @php($j = 1)
                @foreach ($question->reponses as $reponse)
                <?php
                        $isSelected = ($resultat->choix[$i-1]->choix == $j);
                        if($isSelected){
                          $color = $reponse->estCorrecte ? "rgba(0,255,0,0.7)" : "rgba(255,0,0,0.7)";
                        }else{
                          $color = $reponse->estCorrecte ? "rgba(0,255,0,0.1)" : "default";
                        }
                      ?>
                <li class="list-group-item" style="background-color: {{$color}}">
                  <label for="answer {{$i}} {{$j}}">{{$j}}. </label>
                  <input type="radio" class="mx-2" {{$isSelected ? 'checked' : '' }} disabled>
                  <input type="text" class="" value='{{$reponse->text}}'" disabled>
                      </li>
                      @php($j++)
                      @endforeach
                    </ol>
                  </li>
                  @php($i++)
                  @endforeach
                </ul>
                <button class=" btn btn-outline-dark m-2">Back</button>
        </div>
      </div>
    </div>
    @include('js-css-help.table-style')
  </form>
  @include('layouts.footers.auth.footer')
</div>
@endsection