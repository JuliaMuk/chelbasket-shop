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
                    <img src="/img/home/1-1.png" alt="мужчина с кофтой">
                </div>
                <div class="column">
                    <img src="/img/home/1-2.png" alt="мужчина">
                </div>
            </div>
            <a href="#" class="more">узнать подробнее</a>
        </div>
        <div class="season-form">
            <div class="block-info season-info">
                <div class="column season-form-left">
                    <img src="/img/home/2-1.png" alt="">
                    <img src="/img/home/2-2.png" alt="">
                </div>
                <div class="column">
                    <div class="season-form-info">
                        <h3>сезонная форма</h3>
                        <span class="orange"><h4>25-26</h4></span>
                    </div>
                    <p>
                        Пошив по индвидуальным размерам и возможностью нанесения
                        фамилии и номера
                    </p>
                    <img src="/img/home/2-3.png" alt="">
                </div>
            </div>
            <a href="#" class="more">узнать подробнее</a>
        </div>

        <div class="block-cards">
            <div class="block-cards-left">
                <h3>наши товары</h3>
                <button></button>
            </div>
            <div class="block-cards-right">

                <div class="cards-up">
                <a href="{{ route('card', ['product' => $products[0]->slug]) }}" class="card-link">
                    <x-card 
                        :product="$products[0]"
                    />
                </a>
                <a href="{{ route('card', ['product' => $products[1]->slug]) }}" class="card-link">
                    <x-card 
                        :product="$products[1]"
                    />
                </a>
                </div>
                <div class="cards-down">
                <a href="{{ route('card', ['product' => $products[2]->slug]) }}" class="card-link">
                    <x-card 
                        :product="$products[2]"
                    />
                </a>
                <a href="{{ route('card', ['product' => $products[3]->slug]) }}" class="card-link">
                    <x-card 
                        :product="$products[3]"
                    />
                </a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>