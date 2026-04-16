<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/header-footer.css', 'resources/js/app.js'])
    @vite(['resources/css/autorisation.css'])
    @vite(['resources/css/registration.css'])
</head>
<body>
    <header class="header">
        <div class="container-header">
            <div class="header-left">
                <img src="img/icons/logo.webp" alt="logo" class="logo">
            </div>
            <nav class="header-menu">
                <ul>
                    <li><a class="link" href="{{ route('home') }}">Главная</a></li>
                    <li class="dropdown">
                        <a class="link" href="{{ route('categories') }}">Каталог <img src="img/icons/arrow_down.svg" alt="arrow" width="25px"></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Футболки</a></li>
                            <li><a href="#">Майки</a></li>
                            <li><a href="{{ route('balls') }}">Мячи</a></li>
                            <li><a href="#">Кофты</a></li>
                            <li><a href="#">Сувениры</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="header-right">
                <a href=><img src="img/icons/search.svg" alt="search"></a>    
                <a href="{{ route('basket') }}"><img src="img/icons/basket.svg" alt="bag"></a>
                <a href="{{ route('autorisation') }}"><img src="img/icons/user.svg" alt="user"></a>
            </div>
        </div>
    </header>
    <main class="main">
        {{ $slot }}
    </main>
</body>
</html>