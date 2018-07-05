<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="/" class="nav-list__item__link">Главная</a></li>
                @auth
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
                @endauth
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="authorization-block">
                @guest
                    <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                    <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="authorization-block__link">Мои заказы</a>
                    <a href="{{ route('logout') }}" class="authorization-block__link"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                @endguest
            </div>
        </div>
    </header>
    <div class="middle">
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>
<script src="js/main.js"></script>
</body>
</html>