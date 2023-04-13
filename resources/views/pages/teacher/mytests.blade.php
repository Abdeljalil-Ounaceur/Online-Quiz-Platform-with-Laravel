@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'My Tests'])
<div class="container-fluid py-4 align-items-center">
  <div class="col-14 mt-6 mx-auto align-items-center">
    <div class="card align-items-center">
      <div class="card-header p-5 pb-3 px-2 d-inline">
        <h5 style=" float:left" class="m-2">My Test List</h5>
        <a class="btn btn-sm btn-outline-success d-flex" href="{{route('create-test')}}">add Test</a>
      </div>
      <div class="card-body pt-3 p-3 align-items-center justify-content-around">
        @isset($tests)
        @foreach ($tests as $test)
          <div class="macard d-inline-block overflow-hidden">
            <img class="card-img-top sticky-top mb-4 object-fit-fill d-inline-flex" src="/img/hq720.webp">
            <h6 class="mb-3 text-sm text-center">{{$test->titre}}</h6>
          <div class="w-90">
            <span class="mb-2 m-3 text-xs">Author: <span class="text-dark ml-3 font-weight-bold">{{$test->owner->username}}</span></span><br>
            <span class="mb-2 text-xs m-3">Description: <span class="text-dark ml-3 font-weight-bold">
            @if($test->description > 50)
                {{substr($test->description, 0, 30)}}...
            @else
                {{$test->description}}
            @endif</span></span>
            <div class="ms-3 text-center">
              <a class="btn btn-link text-dark px-3 mb-1" href="{{route('edit-test', ['id'=>$test->id])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
              <a class="btn btn-link text-danger px-3 mb-1" href="{{route('delete-test', ['id'=>$test->id])}}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
            </div>
          </div>
        </div>
        @endforeach
        @endisset
                </div>
              </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection