@push('vite')
    @vite('resources/css/history.css')
    @vite('resources/css/cards.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
        <div class="width">
            <h1 class="title-catalog">История заказов</h1>
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
       <div class="more-cards">
         <div class="cards">
            @for ($i = 0; $i < 8; $i++)
                <a href="{{ route('card') }}" class="card-link"><x-cards rating="5" image="/img/ball_icanplay.svg" title="Футболка с логотипом Челбаскета" price="1990" /></a>
            @endfor
            @for ($i = 0; $i < 7; $i++)
                <a href="{{ route('card') }}" class="card-link"><x-card-none image="/img/ball_icanplay.svg" title="Футболка с логотипом Челбаскета" price="1990"/></a>
            @endfor
            <a href="{{ route('card') }}" class="card-link"><x-cards rating="5" image="/img/ball_icanplay.svg" title="Футболка с логотипом Челбаскета" price="1990" /></a>
         </div>
       </div>
       <div class="btn-down">
            <button class="load-more-btn">загрузить ещё</button>
       </div>
     </div>
</x-main-layout>