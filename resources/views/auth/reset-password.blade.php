@extends('layouts.app')

@section('content')
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card card-plain">
            <div class="card-header pb-0 text-start">
              <h4 class="font-weight-bolder">Reset your password</h4>
              <p class="mb-0">Enter your email and please wait a few seconds</p>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="{{ route('reset.perform') }}">
                @csrf
                @method('post')
                <div class="flex flex-col mb-3">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" aria-label="Email">
                  @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Send Reset Link</button>
                </div>
              </form>
            </div>
            <div id="alert">
              @include('components.alert')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection