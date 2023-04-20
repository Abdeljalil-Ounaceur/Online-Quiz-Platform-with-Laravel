@extends('layouts.app', ['class' => 'g-sidenav-show bg-yellow-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])

<div id="alert">
  @include('components.alert')
</div>
<div class="container-fluid py-3">
    <div class="col-12">
      <div class="card">
          <div class="card-header pb-0 align-items-center">
            <div class="d-flex align-items-center">
              <h3 class="mb-3 fst-italic fs-1">{{$test->titre}}</h3>
              <a class="btn btn-primary btn-sm ms-auto float-end" href="{{route('passer-test', ['id' => $test->id])}}">Pass</a>
            </div>
            <hr class="horizontal dark mt-0 ">
          <div class="w-50">
            <div class="align-items-center">
                <img class="mb-4 d-inline object-fit-cover img-fluid align-center" src="{{ asset('test_images/'.$test->image) }}" alt="test image">
            </div>
              <tr><h6> <div class="fw-light">Description:</div> {{$test->description}}</h6>
              {{-- @foreach ($test->tags as $tag)
                  <div class="post-tags mb-4">
                      <strong>Tags : </strong>
                      <span class="badge badge-info">{{ $tag->name }}</span>
                  </div>
              @endforeach --}}
          </div>
      </div>
    </div>
</div>
  @endsection