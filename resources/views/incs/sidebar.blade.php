<aside class="sidebar">
    <div class="sidebar-widget">
        <h3>Категории</h3>
        @if($categories->isNotEmpty())
            <a href="{{ route('blog.index') }}">Все категории</a>
            @foreach($categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->title }}</a>
            @endforeach
        @else
            <p>Категорий пока нет...</p>
        @endif
    </div>
</aside>