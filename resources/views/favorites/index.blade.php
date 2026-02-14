@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-weight-bold mb-5 mt-5 text-white d-flex justify-content-center" style="text-shadow: 0 0 15px rgba(229, 9, 20, 0.6);">
        🤍 {{ __('app.whislist') }}
    </h2>

    <div class="row">
        @foreach($favorites as $fav)
        <div class="col-6 col-md-4 col-lg-3 col-xl-custom-5 mb-4 movie-item" data-aos="fade-up">
            <div class="movie-card h-100 shadow-lg d-flex flex-column">
                <div style="width: 100%; aspect-ratio: 2/3; overflow: hidden; border-radius: 8px 8px 0 0;">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ $fav->poster }}" class="lazyload w-100 h-100" alt="{{ $fav->title }}" style="object-fit: cover;" onerror="hideBrokenImage(this)">
                </div>

                <div class="p-2 d-flex flex-column flex-grow-1" style="background: #181818;">
                    <h6 class="text-truncate font-weight-bold mb-2 text-white" style="font-size: 0.85rem; opacity: 0.8;" title="{{ $fav->title }}">
                        {{ $fav->title }}
                    </h6>

                    <div class="mt-auto d-flex align-items-center" style="gap: 4px;">
                        <a href="/movies/{{ $fav->imdb_id }}" class="btn btn-detail-sm btn-glass btn-sm flex-grow-1 text-center m-0" style="font-size: 0.55rem; padding: 6px 2px; min-width: 0; white-space: nowrap;">
                            {{ __('app.view_details') }}
                        </a>

                        <form method="POST" action="/favorites/{{ $fav->id }}" class="m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-glass btn-glass-danger btn-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; padding: 0; flex-shrink: 0; border-radius: 6px;">
                                <i class="fas fa-trash-alt text-white" style="font-size: 0.7rem;"></i>
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
