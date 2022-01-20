@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumbs__item"><a href="{{ $breadcrumb->url }}">{{ \Illuminate\Support\Str::words($breadcrumb->title, 2, '...') }}</a></li>
            @else
                <li class="breadcrumbs__item breadcrumbs__item_active">{{ \Illuminate\Support\Str::words($breadcrumb->title, 2, '...') }}</li>
            @endif

        @endforeach
    </ol>
@endunless