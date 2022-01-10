@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumbs">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumbs__item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumbs__item breadcrumbs__item_active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>
@endunless