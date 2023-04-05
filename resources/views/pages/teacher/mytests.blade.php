@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
<div class="container-fluid py-4">
  <div class="col-12 mt-4 mx-auto">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">My Test List</h6>
      </div>
      <div class="card-body pt-4 p-3">
        <ul class="list-group">
          @isset($tests)
            @foreach ($tests as $test)          
              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="mb-3 text-sm">{{$test->titre}}</h6>
                  {{-- <span class="mb-2 text-xs">Author: <span class="text-dark ms-sm-2 font-weight-bold">{{$test->owner->username}}</span></span> --}}
                  <span class="mb-2 text-xs">Description: <span class="text-dark font-weight-bold ms-sm-2">{{$test->description}}</span></span>
                </div>
                <div class="ms-auto text-end">
                  <a class="btn btn-link text-dark px-3 mb-0" href="{{route('edit-test', ['id'=>$test->id])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  <a class="btn btn-link text-danger px-3 mb-0" href="{{route('delete-test', ['id'=>$test->id])}}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                </div>
              </li>
            @endforeach
          @endisset
        </ul>
      </div>
    </div>
  </div>
  @include('layouts.footers.auth.footer')
</div>
@endsection