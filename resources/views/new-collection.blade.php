@push('vite')
    @vite('resources/css/new-collection.css')
    @vite('resources/css/cards.css')
    @vite('resources/css/overlay.css')
    @vite('app/Models/Product.php')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>

    <div class="main">
        <div class="width">
            <h1 class="title-catalog">Новая коллекция</h1>
                <div class="filters">
                        <button class="filter-open-btn">
                        Все фильтры
                        <img src="img/icons/icons_filter.svg" alt="фильтры" class="filter-open-btn-img"/>
                        </button>
                    <div class="filter-dropdown">
                        <div class="filter-btn">
                            ПО НАИБОЛЬШЕЙ ЦЕНЕ
                            <img src="img/icons/arrow_down.svg" alt="arrow">
                        </div>

                        <ul class="filter-menu">
                            <li><a href="#">ПО НАИБОЛЬШЕЙ ЦЕНЕ</a></li>
                            <li><a href="#">ПО НАИМЕНЬШЕЙ ЦЕНЕ</a></li>
                            <li><a href="#">ПО РЕЙТИНГУ</a></li>
                            <li><a href="#">ПО НОВИЗНЕ</a></li>
                        </ul>
                    </div>
                </div>
        
            <div class="more-cards">
                <div class="cards">
                    @foreach ($products as $product)
                        <a href="{{ route('card') }}" class="card-link">
                            <x-cards :products="[$product]" />
                        </a>
                    @endforeach
                </div>
            </div>

       <div class="btn-down">
            <button class="load-more-btn">загрузить ещё</button>
       </div>
    </div>
    <x-filter-full></x-filter-full>
</x-main-layout>