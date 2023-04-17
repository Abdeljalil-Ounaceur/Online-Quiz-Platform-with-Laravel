@extends('layouts.app', ['class' => 'g-sidenav-show bg-yellow-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])

<div id="alert">
  @include('components.alert')
</div>
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card">

          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <h3 class="mb-0">{{$test->titre}}</h3>
              <a class="btn btn-primary btn-sm ms-auto" href="{{route('passer-test', ['id' => $test->id])}}">Pass</a>
            </div>
            <div class="row">
              <div class="col-md-12 align-items-center">
                <img class="card-img-top mb-4 d-inline-flex w-100 h-100" src="{{ asset('test_images/'.$test->image) }}" alt="test image">
                <h6>{{$test->description}}</h6>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
  @endsection