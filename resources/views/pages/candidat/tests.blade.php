@extends('layouts.app', ['class' => 'g-sidenav-show bg-yellow-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tests'])
<div class="container-fluid py-4 align-items-center">
  <div class="col-12 mt-4 mx-auto align-items-center">
    <div class="card align-items-center">
      <div class="card-header p-5 pb-3 px-2 d-inline align-items-center">
        <h5 class="mb-0">Test List</h5>
      </div>
      <div class="card-body pt-3 p-3 align-items-center justify-content-around">
        @isset($tests)
        @foreach ($tests as $test)
        <a href="{{route('view-test', ['id' => $test->id])}}">
          <div class="macard d-inline-block overflow-hidden">
            <img class="card-img-top sticky-top mb-4 object-fit-fill d-inline-flex" src="{{ asset('test_images/'.$test->image) }}" alt="test image">
            <h6 class="mb-3 text-sm text-center">{{$test->titre}}</h6>
          <div class="w-90">
            <span class="mb-2 m-3 text-xs">Author: <span class="text-dark ml-3 font-weight-bold">{{$test->owner->username}}</span></span><br>
            <span class="mb-2 text-xs m-3">Description: <span class="text-dark ml-3 font-weight-bold">
            @if($test->description > 50)
                {{substr($test->description, 0, 25)}}...
            @else
                {{$test->description}}
            @endif</span></span>
          </div>
        </div>
        {{-- <div class="list-group-item border-0 col-5 p-15 mb-2 bg-yellow-100 border-radius-lg d-inline-block flex-column overflow-hidden">
          <img class="card-img-top w-60 rounded sticky-top mb-4 object-fit-fill d-inline-flex" src="/img/sdc.jpg">
        </div> --}}
        @endforeach
        @endisset
      </a>
      </div>
    </div>
  </div>
</div>
@endsection