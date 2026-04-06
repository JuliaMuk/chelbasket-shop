@push('vite')
    @vite('resources/css/balls.css')
    @vite('resources/css/cards.css')
    @vite('resources/css/overlay.css')
    @vite('app/Models/Product.php')
@endpush

<x-main-layout>
        <x-slot:title>
            Мячи
        </x-slot:title>
        <x-slot:description>
            {{ $category->meta_description ?? 'Новая коллекция' }}
        </x-slot:description>
        <x-slot:keywords>
            {{ $category->keywords ?? 'Челбаскет, футболки, майки, мячи, кофты, сувениры' }}
        </x-slot:keywords>
    <div class="main">
        <div class="width">
            <h1 class="title-catalog">{{ $category->name ?? 'Новая коллекция' }}</h1>

            


            <div class="more-cards">
                <div class="cards">

                    

                    @foreach ($products as $product)   
                            <a href="{{ route('card', ['product' => $product->slug]) }}" class="card-link">
                                <x-card :product="$product" />
                            </a>
                    @endforeach

                </div>
            </div>

      
        </div>
    </div>
 
</x-main-layout>