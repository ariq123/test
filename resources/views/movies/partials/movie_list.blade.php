@if(isset($movies->Search))
@foreach($movies->Search as $movie)
@if($movie->Poster != "N/A")
<div class="col-6 col-md-4 col-lg-3 col-xl-custom-5 mb-4 movie-item" data-aos="fade-up">
    <div class="movie-card">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="{{ $movie->Poster }}" class="lazyload w-100" alt="{{ $movie->Title }}" onerror="hideBrokenImage(this)" style="aspect-ratio: 2/3; object-fit: cover; border-radius: 4px 4px 0 0;" ;>

        <div class=" p-3">
            <h6 class="movie-title text-truncate" title="{{ $movie->Title }}">
                {{ $movie->Title }}
            </h6>
            <div class="mt-2 d-flex align-items-center justify-content-between">
                <span class="text-muted" style="white-space: nowrap; text-overflow: ellipsis; font-size: 0.73em;">{{ $movie->Year }}</span>
                <a href="/movies/{{ $movie->imdbID }}" class="btn btn-detail-sm">
                    {{ __('app.view_details') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif
