@push('vite')
@vite('resources/css/app.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <x-slot:description>
        Челбаскет - магазин футболок, майок, мячей, кофт и сувениров
    </x-slot:description>
    <x-slot:keywords>
        Челбаскет, футболки, майки, мячи, кофты, сувениры
    </x-slot:keywords>

    <div class="main">
        <div class="intro">
            <p>Официальный магазин бк</p>
            <h1 class="bold">челбаскет</h1>
        </div>

        <div class="marquee">
            <x-marquee></x-marquee>
            <x-marquee></x-marquee>
            <x-marquee></x-marquee>
            <x-marquee></x-marquee>
        </div>
        <div class="new-collection">
            <div class="block-info">
                <div class="column">
                    <h3>новая коллекция</h3>
                    <div class="new-collection-info">
                        <h4>Официальный мерч</h4>
                        <h4><span class="orange">Сезон 25-26</span></h4>
                    </div>
                    <img src="/img/home/1-1.webp" alt="мужчина с кофтой">
                </div>
                <div class="column">
                    <img src="/img/home/1-2.webp" alt="мужчина">
                </div>
            </div>
            <a href="#" class="more">узнать подробнее</a>
        </div>
        <div class="season-form">
            <div class="block-info season-info">
                <div class="column season-form-left">
                    <img src="/img/home/2-1.webp" alt="">
                    <img src="/img/home/2-2.webp" alt="">
                </div>
                <div class="column">
                    <div class="season-form-info">
                        <h3>сезонная форма</h3>
                        <span class="orange">
                            <h4>25-26</h4>
                        </span>
                    </div>
                    <p>
                        Пошив по индвидуальным размерам и возможностью нанесения
                        фамилии и номера
                    </p>
                    <img src="/img/home/2-3.webp" alt="">
                </div>
            </div>
            <a href="#" class="more">узнать подробнее</a>
        </div>

        <div class="block-cards">
            <div class="block-cards-left">
                <h3>наши товары</h3>
                <button id="cards-change"></button>
            </div>
            <div class="block-cards-right">

                <div class="cards-up">
                    <a href="{{ route('card', ['product' => $products[0]]) }}" class="card-link">
                        <x-card
                            :product="$products[0]" />
                    </a>
                    <a href="{{ route('card', ['product' => $products[1]]) }}" class="card-link">
                        <x-card
                            :product="$products[1]" />
                    </a>
                </div>
                <div class="cards-down">
                    <a href="{{ route('card', ['product' => $products[2]]) }}" class="card-link">
                        <x-card
                            :product="$products[2]" />
                    </a>
                    <a href="{{ route('card', ['product' => $products[3]]) }}" class="card-link">
                        <x-card
                            :product="$products[3]" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>

<script>
    const btnChange = document.getElementById('cards-change');

    btnChange.addEventListener('click', (e) => {
        e.preventDefault();



        fetch('/products/change', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const container = document.querySelector('.block-cards-right');
                container.innerHTML = `<div class="cards-up">
                    <a href="/products/${data.products[0].slug}" class="card-link">
                        <div class="card">
                            <div class="rating">
                                <span>${data.products[0].rating}</span>
                                <img class="star" src="/img/icons/star.svg">
                            </div>
                            <div class="edit">
                                <img src="/img/icons/edit.svg">
                            </div>   
                            <img class="card-image" src="storage/${data.products[0].path_img}" width="300px" height="294px"> 
                            <div class="description">
                                <p class="title">${data.products[0].name}</p>
                                <p class="price">${data.products[0].price} ₽</p>
                            </div>
                            <div class="card-button">
                                Купить  
                            </div>
                        </div>
                    </a>
                    <a href="/products/${data.products[1].slug}" class="card-link">
                    <div class="card">
                            <div class="rating">
                                <span>${data.products[1].rating}</span>
                                <img class="star" src="/img/icons/star.svg">
                            </div>
                            <div class="edit">
                                <img src="/img/icons/edit.svg">
                            </div>   
                            <img class="card-image" src="storage/${data.products[1].path_img}" width="300px" height="294px"> 
                            <div class="description">
                                <p class="title">${data.products[1].name}</p>
                                <p class="price">${data.products[1].price} ₽</p>
                            </div>
                            <div class="card-button">
                                Купить  
                            </div>
                        </div>
                    </a>
                    
                    </div>
                    <div class="cards-down">
                    <a href="/products/${data.products[2].slug}" class="card-link">
                    <div class="card">
                            <div class="rating">
                                <span>${data.products[2].rating}</span>
                                <img class="star" src="/img/icons/star.svg">
                            </div>
                            <div class="edit">
                                <img src="/img/icons/edit.svg">
                            </div>   
                            <img class="card-image" src="storage/${data.products[2].path_img}" width="300px" height="294px"> 
                            <div class="description">
                                <p class="title">${data.products[2].name}</p>
                                <p class="price">${data.products[2].price} ₽</p>
                            </div>
                            <div class="card-button">
                                Купить  
                            </div>
                        </div>
                    </a>
                    <a href="/products/${data.products[3].slug}" class="card-link">
                    <div class="card">
                            <div class="rating">
                                <span>${data.products[3].rating}</span>
                                <img class="star" src="/img/icons/star.svg">
                            </div>
                            <div class="edit">
                                <img src="/img/icons/edit.svg">
                            </div>   
                            <img class="card-image" src="storage/${data.products[0].path_img}" width="300px" height="294px"> 
                            <div class="description">
                                <p class="title">${data.products[3].name}</p>
                                <p class="price">${data.products[3].price} ₽</p>
                            </div>
                            <div class="card-button">
                                Купить  
                            </div>
                        </div>
                    </a>
                    </div>`
            })
            .catch(error => console.error('Error:', error));
    })
</script>