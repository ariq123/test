@extends('layouts.app')

@section('content')

<div class="row align-items-center" style="min-height: 80vh;">

    <div class="col-md-5 mb-4" data-aos="fade-right">
        @if($movie->Poster != 'N/A')
        <img src="{{ $movie->Poster }}" class="img-fluid rounded shadow-lg" style="border: 1px solid rgba(255,255,255,0.2); width: 100%; max-width: 400px; display: block; margin: auto;">
        @else
        <img src="https://via.placeholder.com/400x600?text=No+Poster" class="img-fluid rounded shadow-lg">
        @endif
    </div>

    <div class="col-md-7" data-aos="fade-left">

        <h1 class="display-4 font-weight-bold text-white" style="text-shadow: 0 0 20px rgba(0,0,0,0.5);">
            {{ $movie->Title }}
        </h1>

        <div class="d-flex align-items-center mb-4 mt-2">
            <img src="{{ asset('img/imdb.png') }}" alt="IMDb" style="height: 25px; margin-right: 10px;">

            <span class="text-warning font-weight-bold" style="font-size: 1.2rem;">
                <i class="fas fa-star"></i> {{ $movie->imdbRating }}
            </span>
            <span class="text-muted mx-3">|</span>
            <span class="badge badge-secondary p-2">{{ $movie->Year }}</span>
            <span class="badge badge-dark border border-secondary p-2 ml-2">{{ $movie->Runtime }}</span>
        </div>

        <p class="lead" style="color: #ccc; line-height: 1.8; font-size: 1rem;">
            {{ $movie->Plot }}
        </p>

        <hr style="background: rgba(255,255,255,0.1);">

        <div class="row mb-4 text-white-50" style="font-size: 0.9rem;">
            <div class="col-md-6 mb-2"><i class="fas fa-film mr-2 text-danger"></i> <b>Genre:</b> {{ $movie->Genre }}
            </div>
            <div class="col-md-6 mb-2"><i class="fas fa-user-tie mr-2 text-info"></i> <b>Director:</b>
                {{ $movie->Director }}</div>
            <div class="col-md-12"><i class="fas fa-users mr-2 text-success"></i> <b>Actors:</b> {{ $movie->Actors }}
            </div>
        </div>

        <div class="d-flex flex-wrap align-items-center mt-4">

            <form method="POST" action="/favorites" class="mr-2 mb-2">
                {{ csrf_field() }}
                <input type="hidden" name="imdb_id" value="{{ $movie->imdbID }}">
                <input type="hidden" name="title" value="{{ $movie->Title }}">
                <input type="hidden" name="poster" value="{{ $movie->Poster }}">

                <button class="btn btn-glass btn-glass-primary">
                    <i class="fas fa-heart mr-2"></i> {{ __('app.tambah_favorit') }}
                </button>
            </form>

            <a href="https://www.youtube.com/results?search_query={{ urlencode($movie->Title . ' trailer') }}" target="_blank" class="btn btn-glass btn-glass-danger mb-2">
                <i class="fab fa-youtube mr-2"></i> {{ __('app.trailer') }}
            </a>

            <a href="https://www.imdb.com/title/{{ $movie->imdbID }}" target="_blank" class="btn btn-glass btn-glass-warning mb-2">
                <i class="fab fa-imdb mr-2"></i> {{ __('app.lihat_imdb') }}
            </a>

        </div>

    </div>

</div>

@endsection
