@extends('layouts.app',['class' => 'g-sidenav-show bg-yellow-200'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
{{-- <div class="container">
  <div class="row">
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Tests</h5>
          <p class="card-text display-4">25</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Questions</h5>
          <p class="card-text display-4">150</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Candidates</h5>
          <p class="card-text display-4">50</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-danger mb-3">
        <div class="card-body">
          <h5 class="card-title">Results</h5>
          <p class="card-text display-4">75%</p>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="container">
  <!-- Dashboard for teachers -->
  <div class="row" id="teacher-dashboard">
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Tests</h5>
          <p class="card-text display-4">25</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Questions</h5>
          <p class="card-text display-4">150</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Candidates</h5>
          <p class="card-text display-4">50</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-danger mb-3">
        <div class="card-body">
          <h5 class="card-title">Results</h5>
          <p class="card-text display-4">75%</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Dashboard for candidates -->
  <div class="row" id="candidate-dashboard">
    <div class="col-sm-6 col-lg-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Tests Taken</h5>
          <p class="card-text display-4">10</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Average Score</h5>
          <p class="card-text display-4">80%</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Progress</h5>
          <p class="card-text display-4">50%</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection