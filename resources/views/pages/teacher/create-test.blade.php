@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.teacher.topnav', ['title' => 'My Tests'])
    <div class="container-fluid py-4">
        <form method="POST" action="{{ route('save-test') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-12 mt-4 mx-auto">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">New Test</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="mb-5">
                            <label for="title">Title : <span class="text-danger">*</span></label></label>
                            <input type="text" id="title" class="form-control" name="title" />
                            <label for="description">Description : <span class="text-danger">*</span></label></label>
                            <textarea type="text" id="description" rows="4" class="form-control" name="description"></textarea>
                            <label for="image">Upload test image : <span class="text-danger">*</span></label></label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tags : <span class="text-danger">*</span><span class="text-muted"></span></label>
                            <br>
                            <input type="text" name="tags" class="form-control tags" id="tags"
                                placeholder="Enter tags separated by commas">
                            <br>
                            @if ($errors->has('tags'))
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                            Select the category
                        </label>
                         <select id="category" class="form-control mb-4">
                            <option value="1">Tech</option>
                            <option value="2">Health</option>
                            <option value="3">Psychology</option>
                            <option value="4">Literature</option>
                            <option value="5">History</option>
                            <option value="6">Tech</option>
                            <option value="7">Others</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $existingRecordId ? 'selected' : '' }}> {{ $item->name }} </option>
                            @endforeach
                        </select> --}}
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Quiz questions:
                    </label>
                    <ul id="questions" class="list-group">
                        <li id="question 1" class="list-group-item pb-4 mb-4">
                            <label>Question 1</label>
                            <input type="text" id="question text 1" class="form-control mb-4" name="question text 1">
                            <label>Answers</label>
                            <ol type="a" id="answerList 1">
                                <li class="list-group-item">
                                    <label>1. </label>
                                    <input type="radio" class="mx-2" name="radio 1" value="1" checked>
                                    <input type="text" id="answer 1 1" class="me-n1" name="answer 1 1">
                                    <button class="badge text-success mx-1 bg-light border-1" type="button"
                                        onclick="addAnswer(this)">+</button>
                                </li>
                            </ol>
                        </li>
                    </ul>
                </div>
                @include('js-css-help.addToTest')
            </div>
    </div>
    @include('components.test-footer')
    </form>
    @include('layouts.footers.auth.footer')
    </div>
@endsection
