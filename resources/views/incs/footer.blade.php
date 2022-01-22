<footer class="footer">
    <div class="container">
        <div class="footer__nav">
            <nav>
                <ul class="">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('blog.index') }}">Блог</a></li>
                    <li><a href="{{ route('search') }}">Найти мастера</a></li>
                    <li><a href="{{ route('applications.create') }}">Оставить заявку</a></li>
                    <li><a href="{{ route('about') }}">О сервисе</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                </ul>
            </nav>
            <div class="footer__hr"></div>
            <p class="footer__copyright">&#169; 2021-{{ date('Y') }} Beauty Masters</p>
        </div>
    </div>
</footer>