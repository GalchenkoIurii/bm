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
                    <ul class="">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contacts') }}">Contacts</a></li>
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
                <a class="mobile-menu__link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('about') }}">About</a>
            </li>
            <li class="mobile-menu__item">
                <a class="mobile-menu__link" href="{{ route('contacts') }}">Contacts</a>
            </li>
        </ul>
    </nav>
</div>