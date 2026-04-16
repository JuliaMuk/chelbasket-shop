@push('vite')
    @vite(['resources/css/search.css'])
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет - Поиск
    </x-slot:title>

    <div class="search-page">
        <h1 class="title-catalog">Результаты поиска</h1>
        
        @if($products->count() > 0)
            <div class="search-results">
                @foreach ($products as $product)
                    <a href="{{ route('card',['product' => $product->slug]) }}" class="card-link">
                        <x-card :product="$product" />
                    </a>
                @endforeach
            </div>
        @else
            <div class="search-not-found">
                <p>Ничего не найдено</p>
            </div>
        @endif
    </div>
</x-main-layout>