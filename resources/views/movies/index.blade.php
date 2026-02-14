@extends('layouts.app')

@section('content')
<form action="/movies" method="GET" class="mb-5 d-flex justify-content-center">
    <input class="form-control w-50 shadow-lg" type="text" name="search" value="{{ request('search') }}" placeholder="🔍{{ __('app.search_movie') }}" style="
                    background: rgba(255, 255, 255, 0.1); 
                    backdrop-filter: blur(10px); 
                    border: 1px solid rgba(255, 255, 255, 0.2); 
                    color: white; 
                    border-radius: 50px; 
                    padding: 12px 25px;
                    outline: none;
               ">
</form>


<div class="row" id="movie-container">
    @include('movies.partials.movie_list', ['movies' => $movies])
</div>

<div class="ajax-load text-center mt-4" style="display:none;">
    <div class="spinner-border text-light" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <p class="text-white mt-2 small">Memuat film lainnya...</p>
</div>

<div class="no-more-data text-center text-white mt-4" style="display:none;">
    <p class="text-muted">{{ __('app.no_more_data') }}</p>
</div>

@endsection
