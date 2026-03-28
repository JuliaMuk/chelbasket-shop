<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/header-footer.css', 'resources/js/app.js'])
    @stack('vite')
</head>
<body>
    <header class="header">
        <div class="container-header">
            <div class="header-left">
                <img src="img/icons/Logo.svg" alt="logo" class="logo">
            </div>
            <nav class="header-menu">
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
                <a href=><img src="/img/icons/search.svg" alt="search"></a>    
                <a href="{{ route('basket') }}"><img src="/img/icons/basket.svg" alt="bag"></a>
                <a href="{{ route('autorisation') }}"><img src="/img/icons/user.svg" alt="user"></a>
            </div>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer class="footer">
        <div class="up-footer">
            <div class="up-footer-container">
            <div class="left-footer">
                <img src="img/icons/Logo.svg" alt="logo">
                <p>Станьте тем, кто первый узнает об обновлениях в коллекциях</p>
                <input class="footer-input-text" type="text" placeholder="E-mail">
                <p class="label-input">Указывая E-mail вы соглашаетесь с политикой конфиденциальности</p>                
                <input class="footer-btn" type="submit" value="ПОДПИСАТЬСЯ">
            </div>
            <div class="right-footer">
                <div>
                    <li><a href="#">Способы оплаты</a></li>
                    <li><a href="#">Статус заказа</a></li>
                    <li><a href="#">Возвраты</a></li>
                    <li><a href="#">Подарочные карты</a></li>
                    <li><a href="#">Покупателям</a></li>
                </div>
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
                    <p>2025</p>
                </div>
                <div class="under">
                    <a href="#">Политика конфиденциальности</a>
                </div>
                <div>
                    <img src="img/icons/vk.svg" alt="vk">
                    <img src="img/icons/youtube.svg" alt="youtube">
                    <img src="img/icons/tg.svg" alt="tg">
                </div>
            </div>  
        </div>
    </footer>
</body>
</html>