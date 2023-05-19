@extends('layouts.app', ['class' => 'g-sidenav-show bg-yellow-100'])

@section('content')
    @include('layouts.navbars.auth.candidat.topnav', ['title' => 'Tests'])
    <div class="container-fluid py-4 align-items-center">
        <div class="col-12 mt-4 mx-auto align-items-center">
            <div class="card align-items-center">
                <div class="card-header p-5 pb-3 px-2 d-inline align-items-center">
                    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Test
                            List</span></h1>
                    {{-- <div class="post-tags mb-4 align-items-center">
						@isset($tags)
							 {{ $names = $tags->implode($tags,',') }}     {{-- this converts the tags array into a string of names seperated with ,
							{{ $res = explode(',', $names)}}
							@foreach ($res as $name)
								<span class="badge alert-success">{{ htmlspecialchars($name) }}</span>
							@endforeach
						@endisset
					</div> --}}
                    {{-- <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p> --}}
                </div>
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
		// Get the search input element
		var searchInput = document.getElementById('search');

		// Add an event listener to the search input element
		searchInput.addEventListener('keyup', function() {
			// Get the search query
			var query = this.value;

			// Make an AJAX request to the search endpoint
			axios.get('/tests/search', {
					params: {
						search: query
					}
				})
				.then(function(response) {
					// Update the search results
					var resultsElement = document.getElementById('search-results');
					resultsElement.innerHTML = '';

					response.data.forEach(function(test) {
						var div = document.createElement('div');
						div.textContent = test.name;
						resultsElement.appendChild(div);
					});
				})
				.catch(function(error) {
					console.log(error);
				});
		});
	</script> --}}
@endsection
