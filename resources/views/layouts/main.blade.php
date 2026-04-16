<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{ $title ?? 'Челбаскет'}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? 'Челбаскет - магазин футболок, майок, мячей, кофт и сувениров' }}">
    <meta name="keywords" content="{{ $keywords ?? 'Челбаскет, футболки, майки, мячи, кофты, сувениры' }}">

    @vite(['resources/css/header-footer.css', 'resources/js/app.js'])
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    @stack('vite')
</head>

<body>
    <header class="header">
        <div class="container-header">
            <div class="header-left">
                                    <li><a href="{{ route('home') }}">                <img src="/img/icons/logo.webp" alt="logo" class="logo">
</a></li>

            </div>
            <nav class="header-menu" id="headerMenu">
                <ul>
                    <li><a class="link" href="{{ route('home') }}">Главная</a></li>
                    <li class="dropdown">
                        <a class="link" href="{{ route('categories') }}">Каталог <img src="/img/icons/arrow_down.svg" alt="arrow" width="25px"></a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('catalog', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="header-right">
                <form action="{{route('search')}}" method="POST">
                    @csrf
                    <input type="text" class="header-search" name="data">
                    <button type="submit" class="header-search-button"><img src="/img/icons/search.svg" alt="search"></button>
                </form>


                <a href="{{ route('basket') }}">
                    <img src="/img/icons/basket.svg" alt="bag">

                    <div class="basket-count {{ session()->has('count') && session('count') != 0 ? '' : 'invisible' }}"  id='basket-count'>
                        {{ session('count') }}
                    </div>


                </a>

                <button class="burger-menu" id="burgerMenu" aria-label="Меню">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <main>
        @include('layouts.flash-messages')
        {{ $slot }}
    </main>
    <footer class="footer">
        <div class="up-footer">
            <div class="up-footer-container">
                <div class="left-footer">
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                        <img src="/img/icons/logo.webp" alt="logo">
                        <p>Станьте тем, кто первый узнает об обновлениях в коллекциях</p>
                        <input class="footer-input-text" type="text" name="email" placeholder="E-mail" required>
                        <p class="label-input">Указывая E-mail вы соглашаетесь с политикой конфиденциальности</p>
                        <input class="footer-btn" type="submit" value="ПОДПИСАТЬСЯ">
                    </form>

                </div>
                <div class="right-footer">

                    <div>
                        @foreach ($categories as $category)
                        <li><a href="{{ route('catalog', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="down-footer">
            <div class="down-footer-container">
                <div>
                    <p>2026</p>
                </div>
                <div class="under">
                    <a href="#">Политика конфиденциальности</a>
                </div>
                <div class="icons">
                    <a href="https://vk.com/bkchelbasket" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/vk.svg" alt="vk">
                    </a>
                    <a href="https://www.youtube.com/c/bcchelbasketchelyabinsk" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/youtube.svg" alt="youtube">
                    </a>
                    <a href="https://t.me/chelbasket" target="_blank" rel="noopener noreferrer">
                        <img src="/img/icons/tg.svg" alt="tg">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>