@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.teacher.topnav', ['title' => 'My Tests'])
    <div class="container-fluid py-4 align-items-center">
        <div class="col-14 mt-6 mx-auto align-items-center">
            <div class="card align-items-center">
                <div class="card-header p-5 pb-3 px-2" style="position: relative; left:40%">
                    <a class="btn btn-sm btn-outline-success d-flex" href="{{ route('create-test') }}">add Test</a>
                </div>
                <h5 class="m-2">My Test List</h5>
                {{-- @foreach ($tags as $tag)
                    <div class="post-tags mb-4">
                        <strong>Tags : </strong>
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    </div>
                @endforeach --}}
                <div class="card-body pt-3 p-3 align-items-center justify-content-around">

                    @isset($tests)
                        @php($testSet = $tests)
                    @endisset

                    @isset($filteredTests)
                        @php($testSet = $filteredTests)
                    @endisset

                    @foreach ($testSet as $test)
                        <div class="macard d-inline-block overflow-hidden">
                            <img class="card-img-top mb-4 d-inline-flex " src="{{ asset('test_images/' . $test->image) }}"
                                alt="test image">
                            <h6 class="mb-2 text-sm text-center">{{ $test->titre }}</h6>
                            <div class="w-90">
                                <span class="mb-2 m-3 text-xs">Author: <span
                                        class="text-dark ml-3 font-weight-bold">{{ $test->owner->username }}</span></span><br>
                                <span class="mb-3 text-xs m-3">Description: <span class="text-dark ml-3 font-weight-bold">
                                        @if ($test->description > 50)
                                            {{ substr($test->description, 0, 25) }}...
                                        @else
                                            {{ $test->description }}
                                        @endif
                                    </span></span>
                                <div class="ms-3 text-center">
                                    <a class="btn btn-link text-dark px-3 mb-1"
                                        href="{{ route('edit-test', ['id' => $test->id]) }}"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    <a class="btn btn-link text-danger px-3 mb-1"
                                        href="{{ route('delete-test', ['id' => $test->id]) }}"><i
                                            class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
@endsection
