<aside class="sidebar">
    <details class="sidebar-widget">
        <summary class="sidebar-widget__title">
            <h3>Категории</h3>
            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="sidebar-widget__title-icon">
                <path d="M18.71,8.21a1,1,0,0,0-1.42,0l-4.58,4.58a1,1,0,0,1-1.42,0L6.71,8.21a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.59,4.59a3,3,0,0,0,4.24,0l4.59-4.59A1,1,0,0,0,18.71,8.21Z"/>
            </svg>
        </summary>
        @if($categories->isNotEmpty())
            <ul class="sidebar-widget__content">
                <li class="sidebar-widget__item"><a href="{{ route('blog.index') }}">Все категории</a></li>
                @foreach($categories as $category)
                    <li class="sidebar-widget__item"><a href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->title }} ({{ $category->posts->count() }})</a></li>
                @endforeach
            </ul>
        @else
            <p class="sidebar-widget__content">Категорий пока нет...</p>
        @endif
    </details>
    <details class="sidebar-widget">
        <summary class="sidebar-widget__title">
            <h3>Теги</h3>
            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="sidebar-widget__title-icon">
                <path d="M18.71,8.21a1,1,0,0,0-1.42,0l-4.58,4.58a1,1,0,0,1-1.42,0L6.71,8.21a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.59,4.59a3,3,0,0,0,4.24,0l4.59-4.59A1,1,0,0,0,18.71,8.21Z"/>
            </svg>
        </summary>
        @if($tags->isNotEmpty())
            <ul class="sidebar-widget__content">
                <li class="sidebar-widget__item"><a href="{{ route('blog.index') }}">Все теги</a></li>
                @foreach($tags as $tag)
                    <li class="sidebar-widget__item"><a href="{{ route('blog.index', ['tag' => $tag->slug]) }}">{{ $tag->title }} ({{ $tag->posts->count() }})</a></li>
                @endforeach
            </ul>
        @else
            <p class="sidebar-widget__content">Тегов пока нет...</p>
        @endif
    </details>
    <div class="sidebar-widget">
        <div class="btn-container">
            <a href="{{ route('blog.create') }}" class="button button_colored button_shadowed">Добавить пост</a>
        </div>
    </div>
</aside>