<x-main-layout>
    <x-slot:title>
        Челбаскет - Поиск
    </x-slot:title>  
  
    <h1 class="title-catalog">Результаты поиска</h1>
        @if($products->count() > 0)
        <div >
            @foreach ($products as $product)
                <a href="{{ route('card',['product' => $product->slug]) }}" class="card-link">
                    <x-card :product="$product" />
                </a>
            @endforeach
        </div>
        @else
            <p>Ничего не найдено</p>
        @endif
        
    </div>
</x-main-layout>