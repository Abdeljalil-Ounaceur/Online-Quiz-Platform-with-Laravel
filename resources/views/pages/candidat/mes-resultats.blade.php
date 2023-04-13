@extends('layouts.app', ['class' => 'g-sidenav-show bg-yellow-100'])  {{--  this one modifies the gray bg  --}}

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Mes Resultat'])
<div class="container-fluid py-4">
  <div class="col-12 mt-4 mx-auto">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">Mes Resultat</h6>
      </div>
      <div class="card-body pt-4 p-3">
        <ul class="list-group">
          @isset($resultats)
            @foreach ($resultats as $resultat)          
              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-yellow-100 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="mb-3 text-sm">{{$resultat->test->titre}}' result</h6>
                  <span class="mb-2 text-xs">Score: <span class="text-dark ms-sm-2 font-weight-bold">{{$resultat->score}}</span>
                </div>
                <div class="ms-auto text-end">
                  <a class="btn btn-link text-blue px-3 mb-0" href="{{route('view-result', ['id' => $resultat->id])}}"><i class="fas fa-success-alt text-dark me-2" aria-hidden="true"></i>View</a>
                  <a class="btn btn-link text-danger px-3 mb-0" href="{{route('delete-result', ['id' => $resultat->id])}}"><i class="fas fa-success-alt text-dark me-2" aria-hidden="true"></i>Delete</a>
                </div>
              </li>
            @endforeach
          @endisset
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection