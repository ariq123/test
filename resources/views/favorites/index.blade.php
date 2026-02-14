@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-weight-bold mb-4 text-white d-flex justify-content-center" style="text-shadow: 0 0 15px rgba(229, 9, 20, 0.6);">
        ❤️ {{ __('app.whislist') }}
    </h2>

    <div class="row">
        @foreach($favorites as $fav)
        <div class="col-6 col-md-4 col-lg-3 col-xl-custom-5 mb-4 movie-item" data-aos="fade-up">
            <div class="movie-card h-100 shadow-lg">

                <div style="overflow: hidden; border-radius: 8px 8px 0 0; position: relative;">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ $fav->poster }}" class="lazyload w-100" alt="{{ $fav->title }}" style="aspect-ratio: 2/3; object-fit: cover;" onerror="hideBrokenImage(this)">
                </div>

                <div class="p-3 d-flex flex-column mt-4" style="border-radius: 0 0 8px 8px;">

                    <h6 class="text-truncate font-weight-bold mb-3 text-white" title="{{ $fav->title }}">
                        {{ $fav->title }}
                    </h6>

                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <a href="/movies/{{ $fav->imdb_id }}" class="btn btn-glass btn-sm mr-2 text-center" style="font-size: 0.6rem; padding: 7px 0; justify-content: center;">
                            {{ __('app.view_details') }}
                        </a>

                        <form method="POST" action="/favorites/{{ $fav->id }}" class="d-inline m-0 p-0">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-glass btn-glass-danger btn-sm px-3" style="padding: 6px 10px; border-color: rgba(229, 9, 20, 0.3);">
                                <i class="fas fa-trash-alt" style="color: #ff4444;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
