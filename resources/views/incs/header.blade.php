<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="logo">
                <a href="{{ route('home') }}" class="logo__link">
                    Beauty Masters
                </a>
            </div>
            <div class="menu">
                <button id="mobileMenuOpen" class="menu__btn"></button>
                <nav class="menu__nav">
                    <ul class="menu-box">
                        <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Главная</a></li>
                        <li class="menu__item"><a class="menu__link" href="{{ route('search') }}">Найти мастера</a></li>
                        <li class="menu__item"><a class="menu__link" href="{{ route('applications.create') }}">Оставить заявку</a></li>
                        @if(auth()->check() && auth()->user()->is_master)
                            <li class="menu__item"><a class="menu__link" href="{{ route('applications.index') }}">Заявки</a></li>
                            @endif
                        <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">О сервисе</a></li>
                    </ul>
                    <ul class="menu-box">
                        @if(auth()->check() && auth()->user()->is_admin)
                            <li class="menu__item"><a class="menu__link" href="{{ route('admin.index') }}">Админпанель</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('blog.index') }}">Блог</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('profiles.show', ['profile' => $user_data['profile_id']]) }}">Мой профиль</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('logout') }}">Выйти</a></li>
                        @elseif(auth()->check())
                            <li class="menu__item"><a class="menu__link" href="{{ route('blog.index') }}">Блог</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('profiles.show', ['profile' => $user_data['profile_id']]) }}">Мой профиль</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('logout') }}">Выйти</a></li>
                        @else
                            <li class="menu__item"><a class="menu__link" href="{{ route('blog.index') }}">Блог</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('register.create') }}">Регистрация</a></li>
                            <li class="menu__item"><a class="menu__link" href="{{ route('login.create') }}">Вход</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="mobileMenu" class="mobile-menu container">
    <div class="mobile-menu__btn-wrapper">
        <button id="mobileMenuClose" class="mobile-menu__btn"></button>
    </div>
    <nav class="mobile-menu__nav">
        <ul class="">
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('home') }}">Главная</a>
            </li>
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('blog.index') }}">Блог</a>
            </li>
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('search') }}">Найти мастера</a>
            </li>
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('applications.create') }}">Оставить заявку</a>
            </li>
            @if(auth()->check() && auth()->user()->is_master)
                <li class="mobile-menu__item">
                    <a class="mobile-menu__link" href="{{ route('applications.index') }}">Заявки</a>
                </li>
            @endif
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('about') }}">О сервисе</a>
            </li>
            @if(auth()->check() && auth()->user()->is_admin)
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('admin.index') }}">Админпанель</a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('profiles.show', ['profile' => $user_data['profile_id']]) }}">Мой профиль</a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('logout') }}">Выйти</a>
                    </li>
                @elseif(auth()->check())
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('profiles.show', ['profile' => $user_data['profile_id']]) }}">Мой профиль</a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('logout') }}">Выйти</a>
                    </li>
                @else
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('register.create') }}">Регистрация</a>
                    </li>
                    <li class="mobile-menu__item">
                        <a class="mobile-menu__link" href="{{ route('login.create') }}">Вход</a>
                    </li>
                @endif
        </ul>
    </nav>
</div>